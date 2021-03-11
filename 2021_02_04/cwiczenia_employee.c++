#include <iostream>
#include <fstream>
#include <vector>

using namespace std;

struct Employee
{
    uint id;
    unsigned short numberOfNames;
    string *names;
    unsigned short numberOfSurnames;
    string *surnames;
    int department;
    double percentageAttendance;
    float footSize;
    char mark;
};

void saveEmployee(string path, Employee emp)
{
    ofstream fout;
    int size;
    fout.open(path, ios::binary | ios::app);
    fout.write((char *)&emp.id, sizeof(emp.id));
    fout.write((char *)&emp.numberOfNames, sizeof(emp.numberOfNames));
    for (int i = 0; i < emp.numberOfNames; i++)
    {
        size = emp.names[i].size();
        fout.write((char *)&size, sizeof(size));
        fout.write((char *)emp.names[i].data(), size);
    }
    fout.write((char *)&emp.numberOfSurnames, sizeof(emp.numberOfSurnames));
    for (int i = 0; i < emp.numberOfSurnames; i++)
    {
        size = emp.surnames[i].size();
        fout.write((char *)&size, sizeof(size));
        fout.write((char *)emp.surnames[i].data(), size);
    }
    fout.write((char *)&emp.department, sizeof(emp.department));
    fout.write((char *)&emp.percentageAttendance, sizeof(emp.percentageAttendance));
    fout.write((char *)&emp.footSize, sizeof(emp.footSize));
    fout.write((char *)&emp.mark, sizeof(emp.mark));
    fout.close();
}

Employee readEmployee(string path)
{
    ifstream fin;
    fin.open(path, ios::binary | ios::in);
    Employee emp;
    int size;
    fin.read((char *)&emp.id, sizeof(emp.id));
    fin.read((char *)&emp.numberOfNames, sizeof(emp.numberOfNames));
    emp.names = new string[emp.numberOfNames];
    for (int i = 0; i < emp.numberOfNames; i++)
    {
        fin.read((char *)&size, sizeof(size));
        emp.names[i].resize(size);
        fin.read((char *)&emp.names[i][0], size);
    }
    fin.read((char *)&emp.numberOfSurnames, sizeof(emp.numberOfSurnames));
    emp.surnames = new string[emp.numberOfSurnames];
    for (int i = 0; i < emp.numberOfSurnames; i++)
    {
        fin.read((char *)&size, sizeof(size));
        emp.surnames[i].resize(size);
        fin.read((char *)&emp.surnames[i][0], size);
    }
    fin.read((char *)&emp.department, sizeof(emp.department));
    fin.read((char *)&emp.percentageAttendance, sizeof(emp.percentageAttendance));
    fin.read((char *)&emp.footSize, sizeof(emp.footSize));
    fin.read((char *)&emp.mark, sizeof(emp.mark));
    fin.close();
    return emp;
}

vector<Employee> readEmployees(string path)
{
    ifstream fin;
    fin.open(path, ios::binary | ios::in);
    vector<Employee> emps;
    while (!fin.eof())
    {
        int size;
        Employee emp = Employee();
        fin.read((char *)&emp.id, sizeof(emp.id));
        fin.read((char *)&emp.numberOfNames, sizeof(emp.numberOfNames));
        emp.names = new string[emp.numberOfNames];
        for (int i = 0; i < emp.numberOfNames; i++)
        {
            fin.read((char *)&size, sizeof(size));
            emp.names[i].resize(size);
            fin.read((char *)&emp.names[i][0], size);
        }
        fin.read((char *)&emp.numberOfSurnames, sizeof(emp.numberOfSurnames));
        emp.surnames = new string[emp.numberOfSurnames];
        for (int i = 0; i < emp.numberOfSurnames; i++)
        {
            fin.read((char *)&size, sizeof(size));
            emp.surnames[i].resize(size);
            fin.read((char *)&emp.surnames[i][0], size);
        }
        fin.read((char *)&emp.department, sizeof(emp.department));
        fin.read((char *)&emp.percentageAttendance, sizeof(emp.percentageAttendance));
        fin.read((char *)&emp.footSize, sizeof(emp.footSize));
        fin.read((char *)&emp.mark, sizeof(emp.mark));
        if (!fin.eof())
            emps.push_back(emp);
    }
    fin.close();
    return emps;
}

void printEmployee(Employee e1)
{
    cout << "Odczytano: "
         << "\n\tid: " << e1.id
         << "\n\tnumberOfNames: " << e1.numberOfNames
         << "\n\tnames:";
    for (int i = 0; i < e1.numberOfNames; i++)
        cout << "\n\t\t" << e1.names[i];
    cout << "\n\tnumberOfSurnames: " << e1.numberOfSurnames
         << "\n\tsurnames:";
    for (int i = 0; i < e1.numberOfSurnames; i++)
        cout << "\n\t\t" << e1.surnames[i];
    cout << "\n\tdepartment: " << e1.department
         << "\n\tpercentageAttendance: " << e1.percentageAttendance
         << "\n\tfootSize: " << e1.footSize
         << "\n\tmark: " << e1.mark << '\n';
}

int main(void)
{
    string imiona[]{"Krystyna", "Paulina"};
    string imiona2[]{"Kryst", "Pau"};
    string nazwiska[]{"Łosoś", "Okoń", "Płotka"};
    string nazwiska2[]{"Łoso", "Oko", "Płotk"};

    auto e = Employee{5, 2, imiona, 3, nazwiska, 3, 0.25, 9.5, 'B'};
    auto e2 = Employee{6, 2, imiona2, 3, nazwiska2, 4, 0.5, 8, 'C'};
    saveEmployee("pracownik_plik.bin", e);
    saveEmployee("pracownik_plik.bin", e2);
    auto e1 = readEmployees("pracownik_plik.bin");
    for (auto i : e1)
    {
        printEmployee(i);
    }

    return 0;
}