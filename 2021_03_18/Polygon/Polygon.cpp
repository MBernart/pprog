//
// Created by berni on 18/03/2021.
//
#include <math.h>
#include "Polygon.h"

/**
 * Konstruktor domyślny klasy Polygon
 */
Polygon::Polygon()
{
    std::cout << "Wywołanie konstruktora domyślnego\n";
    count = 0;
    vertices = nullptr;
}

/**
 * Dwuargumentowy konstruktor klasy Polygon
 *
 * @param vertices[in] argument typu Punkt2*  przekazujący tablicę wierzchołków wielokąta
 * @param count[in] argument typu unsigned int przekazujący ilość wierzchołków.
 */
Polygon::Polygon(Punkt2 *vertices, unsigned int count)
{
    std::cout << "Wywołanie konstruktora dwuargumentowego\n";
    this->count = count;
//    this->vertices = new Punkt2[count];
    this->vertices = new Punkt2[count];
    for (int i = 0; i < count; i++)
        this->vertices[i] = vertices[i];
}

/**
 * Konstruktor kopiujący klasy Polygon
 *
 * @param pol[in] obiekt klasy Polygon
 */
Polygon::Polygon(const Polygon &pol)
{
    std::cout << "Wywołanie konstruktora kopiującego\n";
    count = pol.count;
    vertices = new Punkt2[pol.count];
    for (int i = 0; i < count; i++)
        vertices[i] = pol.vertices[i];
}

/**
 * Destruktor klasy Polygon
 */
Polygon::~Polygon()
{
    std::cout << "Wywołanie destruktora\n";
}

/**
 * Metoda zmieniająca wspólrzędne i-tego wierzchołka.
 *
 * @param i argument typu int  przekazujący numer wierchołka do zmiany
 * @param x argument typu  double przekazujący nową wartość do współrzędnej x.
 * @param y argument typu  double przekazujący nową wartość do współrzędnej y.
 *
 * @relatesalso Punkt2.setX(), Punkt2.setY()
 */
void Polygon::changeVertex(int i, double x, double y)
{
    vertices[i - 1].setX(x);
    vertices[i - 1].setY(y);
}

/**
 * Metoda konstruująca tablicę wierzchołków.
 *
 * @param _vertices argument typu Punkt2*  przekazujący tablicę wierzchołków wielokąta
 * @param _count argument typu unsigned int przekazujący ilość wierzchołków.
 *
 * @relatesalso changeVertex()
 */
void Polygon::setVertices(Punkt2 *_vertices, int _count)
{
    if (!(vertices == nullptr))
        delete vertices;
    vertices = new Punkt2[_count];
    for (int i = 0; i < _count; ++i)
        changeVertex(i, _vertices[i].getX(), _vertices[i].getY());
    count = _count;
}

/**
* Metoda ustawiająca ilość wierzchołków.
*
* @param n n argument typu int przekazujący ilość wierchołków
*
* @relatesalso setVertices()
*/
void Polygon::setCount(int n)
{
    Punkt2 temp_vertices[n];
    for (int i = 0; i < count; i++)
        temp_vertices[i] = vertices[i];
    setVertices(temp_vertices, n);
    count = n;
}

/**
 * Metoda obliczająca obwód wielokąta
 *
 * @return wartość typu doule reprezentująca obwód wielokąta
 */
double Polygon::getPerimeter()
{
    auto perimeter{0.0};
    for (int i = 0; i < count - 1; i++)
        perimeter += vertices[i].getDistance(vertices[i + 1]);
    perimeter += vertices[0].getDistance(vertices[count - 1]);
    return perimeter;
}

/**
 * Metoda zwracająca wskaźnik do tablicy wierzchołków
 *
 * @return wartość typi Punkt2* reprezentująca współrzędne wierzchołków
 */
Punkt2 *Polygon::getVertices()
{
    auto vertices_array = new Punkt2[count];
    for (int i = 0; i < count; i++)
        vertices_array[i] = vertices[i];
    return vertices_array;
}

/**
 * Metoda zwraca pole trójkąta
 *
 * @param p1 argument typu Punkt2 przekazujący wierzchołek trójkąta
 * @param p2 argument typu Punkt2 przekazujący wierzchołek trójkąta
 * @param p3 argument typu Punkt2 przekazujący wierzchołek trójkąta
 *
 * @return wartość typu double reprezentującą pole trójkąta
 */
double Polygon::getTriangleArea(Punkt2 p1, Punkt2 p2, Punkt2 p3)
{
    return (((p2.getX() - p1.getX()) * (p3.getY() - p1.getY()) -
             (p2.getY() - p1.getY()) * (p3.getX() - p1.getX()))) / 2;
}

/**
 * Metoda obliczająca pole wielokąta wypukłego *
 * @param convexVertex
 *
 * @throws There is no vertex {convexVertex}
 *
 * @return wartość typu double reprezentująca pole wielokąta wypukłego
 */
double Polygon::getConvexArea()
{
    double area{0.0};
    for (int i = 1; i < count -1; i++)
            area += getTriangleArea(vertices[0],
                                    vertices[i], vertices[i + 1]);
    return area;
}

double Polygon::getArea()
{
    double area{0.0};
    return area;
}

