/**
 * @file main.cpp
 * @author Mateusz Bernart (mateuszbernart@gmail.com)
 * @brief 
 * @version 0.1
 * @date 2021-04-22
 * 
 * @copyright Copyright (c) 2021
 * 
 */

#include <iostream>

using namespace std;

class Boo
{
public:
    int x;
    char *tab;
    uint tab_size;

    Boo(int _x, char *_tab, uint _tab_size)
    {
        x = _x;
        tab_size = _tab_size;
        tab = new char[tab_size];
        for (int i = 0; i < tab_size; i++)
            tab[i] = _tab[i];
    }
    Boo(Boo &&boo)
    {
        tab = boo.tab;
        cout << "boo.tab_size = " << boo.tab_size << '\n';
        tab_size = boo.tab_size;
        boo.tab_size = 0;
        boo.tab = nullptr;
    }
    ~Boo()
    {
        if (tab)
        {
            delete[] tab;
            cout << "destruktor i usunięcie tablicy o rozmiarze " << tab_size << '\n';
        }
        cout << "destruktor\n";
    }
};

int main(void)
{
    char *t = new char[4]{'a', 'b', 'c', 'd'};
    Boo boo{5, t, 4};
    auto boo1 = move(boo);
    cout << boo.tab_size << '\n';

    return 0;
}