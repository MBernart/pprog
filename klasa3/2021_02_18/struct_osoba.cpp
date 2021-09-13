#include <iostream>
#include <fstream>

using namespace std;

struct Osoba
{
    string imie_nazwisko[2];
    int pozycja;
    float id;
};

struct Zawody
{
    int N;
    Osoba *zawodnicy;
};

void saveZawody(Zawody zawody, string path)
{
    ofstream fout;
    int size;
    fout.open(path, ios::out | ios::binary);
    fout.write((char *)&zawody.N, sizeof(zawody.N));
    for (int i = 0; i < zawody.N; i++)
    {
        for (int j = 0; j < 2; j++)
        {
            size = zawody.zawodnicy[i].imie_nazwisko[j].size();
            fout.write((char *)&size, sizeof(size));
            fout.write((char *)zawody.zawodnicy[i].imie_nazwisko[j].data(), size);
        }
        fout.write((char *)&zawody.zawodnicy[i].pozycja, sizeof(zawody.zawodnicy[i].pozycja));
        fout.write((char *)&zawody.zawodnicy[i].id, sizeof(zawody.zawodnicy[i].id));
    }
    fout.close();
}

Zawody readZawody(string path)
{
    ifstream fin;
    int size = 0;
    Zawody zawody;
    fin.open(path, ios::in | ios::binary);
    fin.read((char *)&zawody.N, sizeof(zawody.N));
    zawody.zawodnicy = new Osoba[zawody.N];
    for (int i = 0; i < zawody.N; i++)
    {
        for (int j = 0; j < 2; j++)
        {
            fin.read((char *)&size, sizeof(size));
            zawody.zawodnicy[i].imie_nazwisko[j].resize(size);
            fin.read((char *)&zawody.zawodnicy[i].imie_nazwisko[j][0], size);
        }
        fin.read((char *)&zawody.zawodnicy[i].pozycja, sizeof(zawody.zawodnicy[i].pozycja));
        fin.read((char *)&zawody.zawodnicy[i].id, sizeof(zawody.zawodnicy[i].id));
    }
    fin.close();
    return zawody;
}

int main(void)
{
    Osoba o1{{"barbara", "nowak"}, 1, 1.1};
    Osoba o2{{"ewa", "mewa"}, 1, 1.2};
    Zawody z;
    z.N = 2;
    z.zawodnicy = new Osoba[2];
    z.zawodnicy[0] = o1;
    z.zawodnicy[1] = o2;
    saveZawody(z, "plik.bin");
    Zawody z2 = readZawody("plik.bin");
    cout    << z2.zawodnicy[0].id << '\n'
            << z2.zawodnicy[1].imie_nazwisko[1];

    return 0;
}