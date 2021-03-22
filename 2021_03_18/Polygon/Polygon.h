//
// Created by berni on 18/03/2021.
//

#ifndef PUNKT2_POLYGON_H
#define PUNKT2_POLYGON_H

#ifndef _POLYGON_H
#define _POLYGON_H

#include "Punkt2.h"

class Polygon
{
    /// Ilość wierzchołków wielokąta
    unsigned int count;

    /// Tablica wierzchołków
    Punkt2 *vertices = nullptr;

    /// Ilość obiektów typu Polygon
    static uint number;

    /**
     * Metoda zwraca pole trójkąta
     *
     * @param p1 argument typu Punkt2 przekazujący wierzchołek trójkąta
     * @param p2 argument typu Punkt2 przekazujący wierzchołek trójkąta
     * @param p3 argument typu Punkt2 przekazujący wierzchołek trójkąta
     *
     * @return wartość typu double reprezentującą pole trójkąta
     */
    static double getTriangleArea(const Punkt2 &p1, const Punkt2 &p2, const Punkt2 &p3);

public:
    /**
     * Metoda konstruująca tablicę wierzchołków.
     *
     * @param _vertices argument typu Punkt2* przekazujący tablicę wierzchołków wielokąta
     * @param _count argument typu unsigned int przekazujący ilość wierzchołków.
     *
     * @relatesalso changeVertex()
     *
     */
    void setVertices(Punkt2 *_vertices, int _count);

    /**
     * Konstruktor domyślny klasy
     */
    Polygon();

    /**
     * Konstruktor klasy - wierzchołkom przypisuje się wartości domyślne
     *
     * @param i ilość wierzchołków
     */
    explicit Polygon(uint i);

    /**
     * Konstruktor klasy z wierzchołkami danymi w tablicy
     *
     * @param _vertices argument typu Punkt2*  przekazujący tablicę wierzchołków wielokąta
     * @param _count argument typu  unsigned int przekazujący ilość wierzchołków.
     */
    Polygon(Punkt2 *_vertices, uint _count);

    /**
     * Konstruktor kopiujący
     *
     * @param polygon argument typu Polygon
     */
    Polygon(const Polygon &polygon);

    /**
    * Destruktor klasy Polygon
    */
    ~Polygon();

    /**
     * Metoda zmieniająca współrzędne i-tego wierzchołka.
     *
     * @param i argument typu int  przekazujący numer wierzchołka do zmiany
     * @param x argument typu  double przekazujący nową wartość do współrzędnej x.
     * @param y argument typu  double przekazujący nową wartość do współrzędnej y.
     *
     * @relatesalso Punkt2.setX(), Punkt2.setY()
     */
    void changeVertex(int i, double x, double y);

    /**
    * Metoda ustawiająca ilość wierzchołków.
    *
    * @param n n argument typu int przekazujący ilość wierzchołków
    *
    * @relatesalso setVertices()
    */
    void setCount(int n);

    /**
     * Metoda obliczająca obwód wielokąta
     *
     * @return wartość typu double reprezentująca obwód wielokąta
     */
    double getPerimeter() const;

    /**
     * Metoda zwracająca wskaźnik do tablicy wierzchołków
     *
     * @return wartość typu Punkt2* reprezentująca współrzędne wierzchołków
     */
    Punkt2 *getVertices() const;

    /**
     * Metoda obliczająca pole wielokąta wypukłego
     *
     * @return wartość typu double reprezentująca pole wielokąta wypukłego
     */
    double getConvexArea() const;

    /**
     * Metoda obliczająca pole dowolnego wielokąta
     *
     * @return wartość typu double reprezentująca pole wielokąta
     */
    double getArea() const;

    /**
     * Funkcja wypisuje wielokąt wraz z obliczonymi wartościami
     */
    void print() const;

    /**
     * Metoda zwracająca ilość powstałych obiektów klasy Polygon
     *
     * @return wartość typu uint reprezentująca ilość powstałych wielokątów
     */
    static uint howMany()
    {
        return Polygon::number;
    }
};

#endif

#endif //PUNKT2_POLYGON_H
