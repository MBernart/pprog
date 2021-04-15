#include "Punkt2.h"
#include "Polygon.h"
#include <iostream>

using std::cout;

int main()
{
    //     // tworzenie reprezentanta klasy Polygon
    //     auto p = Polygon(new Punkt2[4]{Punkt2(0, 1), Punkt2(0, 0), Punkt2(1, 0), Punkt2(1, 1)}, 4);

    //     // tworzenie kopii obiektu p
    //     auto c = p;

    //     // wypisanie wartości obwodu wielokąta c
    //     c.print();

    //     // deklaracja indeksu wierzchołka, który zmienimy
    //     uint n{3};

    //     // zmiana współrzędnych wierzchołka n
    //     c.changeVertex(n, 5, 5);

    //     cout << "\nTutaj zmieniamy wierzchołek z indeksem " << n << " na: (" << 5 << ";" << 5 << ")\n";

    //     // wypisanie własności wielokąta
    //     c.print();

    //     cout << "\n\n";

    //     // alokacja pamięci na trójkąt
    //     auto triangle = new Polygon();

    //     // przypisanie wierzchołków trójkąta
    //     triangle->setVertices(new Punkt2[3]{Punkt2(0, 4), Punkt2(0, 0), Punkt2(3, 0)}, 3);
    //     triangle->print();

    //     cout << "\nDla pewności jeszcze raz wypiszmy te wierzchołki:\n";
    //     Punkt2 *triangle_vertices = triangle->getVertices();
    //     for (int i = 0; i < 3; i++)
    //         cout << triangle_vertices[i] << " ";
    //     cout << '\n';

    //     // wywołanie destruktora trójkąta
    //     delete triangle;

    //     cout << "\n\n"
    //          << "Ilość aktualnie istniejących obiektów typu Polygon: " << Polygon::howMany() << '\n';
    //     cout << "\n\n\n";

    //     Punkt2 p1(1, 3), p2(5, 1), p3;
    //     p3 = p1 + p2;
    // //    auto p4 = p1.operator+(p2);
    //     cout << "X: " << p3.getX() << "\nY: " << p3.getY() << "\n";
    // //    cout << "X: " << p4.getX() << "\nY: " << p4.getY() << "\n";
    //     return 0;

    Punkt2 p[]{Punkt2{2.0, 3.0}, Punkt2{4.0, 5.0}, Punkt2{10.0, 10.0}};
    // p1 = p1;
    Polygon pol = Polygon(p, 3);
    cout << pol.getVertices()[1] << '\n'
         << pol[1] << '\n';
    return 0;
}