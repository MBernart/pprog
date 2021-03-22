#include "Punkt2.h"
#include "Polygon.h"
#include <iostream>

using std::cout;

int main()
{
    // tworzenie reprezentanta klasy Polygon
    auto p = Polygon(new Punkt2[4]{Punkt2(0, 1), Punkt2(0, 0), Punkt2(1, 0), Punkt2(1, 1)}, 4);

    // tworzenie kopii obiektu p
    auto c = p;

    // wypisanie wartości obwodu wielokąta c
    c.print();

    // deklaracja indeksu wierzchołka, który zmienimy
    uint n{3};

    // zmiana współrzędnych wierzchołka n
    c.changeVertex(n, 5, 5);

    cout << "\nTutaj zmieniamy wierzchołek z indeksem " << n << " na: (" << 5 << ";" << 5 << ")\n";

    // wypisanie własności wielokąta
    c.print();

    cout << "\n\n";

    // alokacja pamięci na trójkąt
    auto triangle = new Polygon();

    // przypisanie wierzchołków trójkąta
    triangle->setVertices(new Punkt2[3]{Punkt2(0, 4), Punkt2(0, 0), Punkt2(3, 0)}, 3);
    triangle->print();

    cout << "\nDla pewności jeszcze raz wypiszmy te wierzchołki:\n";
    Punkt2 *triangle_vertices = triangle->getVertices();
    for (int i = 0; i < 3; i++)
        cout << triangle_vertices[i] << " ";
    cout << '\n';

    // wywołanie destruktora trójkąta
    delete triangle;

    cout << "\n\n"
         << "Ilość aktualnie instniejących obiektów typu Polygon: " << Polygon::howMany() << '\n';

    return 0;
}