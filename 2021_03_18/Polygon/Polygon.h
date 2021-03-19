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
    /// Tablica wierzochołków
    Punkt2 *vertices;

    /**
     * Metoda zwraca pole trójkąta
     *
     * @param p1 argument typu Punkt2 przekazujący wierzchołek trójkąta
     * @param p2 argument typu Punkt2 przekazujący wierzchołek trójkąta
     * @param p3 argument typu Punkt2 przekazujący wierzchołek trójkąta
     *
     * @return wartość typu double reprezentującą pole trójkąta
     */
    double getTriangleArea(Punkt2 p1, Punkt2 p2, Punkt2 p3);

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
    Polygon(uint i);

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
     * Metoda zmieniająca wspólrzędne i-tego wierzchołka.
     *
     * @param i argument typu int  przekazujący numer wierchołka do zmiany
     * @param x argument typu  double przekazujący nową wartość do współrzędnej x.
     * @param y argument typu  double przekazujący nową wartość do współrzędnej y.
     *
     * @relatesalso Punkt2.setX(), Punkt2.setY()
     */
    void changeVertex(int i, double x, double y);

    /**
    * Metoda ustawiająca ilość wierzchołków.
    *
    * @param n n argument typu int przekazujący ilość wierchołków
    *
    * @relatesalso setVertices()
    */
    void setCount(int n);

    /**
     * Metoda obliczająca obwód wielokąta
     *
     * @return wartość typu doule reprezentująca obwód wielokąta
     */
    double getPerimeter();

    /**
     * Metoda zwracająca wskaźnik do tablicy wierzchołków
     *
     * @return wartość typi Punkt2* reprezentująca współrzędne wierzchołków
     */
    Punkt2 *getVertices();

    /**
     * Metoda zwracająca wartość true jeśli wielokąt jest wypukły,
     * fałsz jeśli jest wklęsły.
     *
     * @return wartość typu bool reprezentująca prawdziwość zdania
     * "Wielokąt jest wypukły"
     */
    bool isConvex();

    /**
     * Metoda obliczająca pole wielokąta wypukłego
     *
     * @param convexVertex
     *
     * @throws There is no vertex {convexVertex}
     *
     * @return wartość typu double reprezentująca pole wielokąta wypukłego
     */
    double getConvexArea();

    /**
     * Metoda obliczająca pole dowolnego wielokąta
     *
     * @return wartość typu double reprezentująca pole wielokąta
     */
    double getArea();
};

#endif

#endif //PUNKT2_POLYGON_H
