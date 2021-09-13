#include <iostream>
#include <fstream>
#include <string>

using namespace std;

void writeToBin_1(string name, double d, int n, bool b, char c)
{

    ofstream outFileB;

    outFileB.open(name, ios::out | ios::binary);

    outFileB.write((char *)&d, sizeof(double));
    outFileB.write((char *)&n, sizeof(int));
    outFileB.write((char *)&b, sizeof(bool));
    outFileB.write((char *)&c, sizeof(char));

    outFileB.close();
}

void readFromBin_1(string name)
{
    double d;
    int n;
    bool b;
    char c;

    ifstream inFileB;

    inFileB.open(name, ios::in | ios::binary);

    inFileB.read((char *)&d, sizeof(double));
    inFileB.read((char *)&n, sizeof(int));
    inFileB.read((char *)&b, sizeof(bool));
    inFileB.read((char *)&c, sizeof(char));
    cout << "d = " << d << "\n";
    cout << "n = " << n << "\n";
    cout << "b = " << b << "\n";
    cout << "c = '" << c << "'\n";
}

void writeToBin_2(string name, double d, int n, bool b, char c, string s)
{

    ofstream outFileB;

    outFileB.open(name, ios::out | ios::binary);

    outFileB.write((char *)&d, sizeof(double));
    outFileB.write((char *)&n, sizeof(int));
    outFileB.write((char *)&b, sizeof(bool));
    outFileB.write((char *)&c, sizeof(char));
    int size = s.size();
    outFileB.write((char *)&size, sizeof(size));
    outFileB.write((char *)s.data(), size);

    outFileB.close();
}

void readFromBin_2(string name)
{
    double d;
    int n;
    bool b;
    char c;
    string cs;
    string s;

    ifstream inFileB;

    inFileB.open(name, ios::in | ios::binary);

    inFileB.read((char *)&d, sizeof(double));
    inFileB.read((char *)&n, sizeof(int));
    inFileB.read((char *)&b, sizeof(bool));
    inFileB.read((char *)&c, sizeof(char));
    int ssize;
    inFileB.read((char *)&ssize, sizeof(ssize));
    s.resize(ssize);
    inFileB.read((char *)&s[0], ssize);

    cout << "d = " << d << "\n";
    cout << "n = " << n << "\n";
    cout << "b = " << b << "\n";
    cout << "c = " << c << "\n";
    cout << "s = " << s << "\n";
}

int main(void)
{
    double a = 3.1415;
    int b = 6;
    bool c = true;
    char d = 'o';
    writeToBin_1("plik.bin", a, b, c, d);
    readFromBin_1("plik.bin");
    return 0;
}