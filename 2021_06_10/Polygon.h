#pragma once

/** @file Polygon.h
 *
 * @brief Zawiera deklarację klasy Polygon
 *
 * @author Patryk Janiak 3D
 * @date 2021.03.18
 * @version 1.0
 */

#include "Punkt2.h"

/** @brief Wielokąt składający się z wierzchołków */
class Polygon
{
    /** @brief Ilość wierzchołków wielokąta */
    unsigned int count; 
    
    /** @brief Tablica wierzchołków typu Punkt2 */
    Punkt2 * vertices; 

    /** 
     * @brief Prywatna metoda obliczająca pole powierzchni trójkąta
     * 
     * @param p1 argument typu Punkt2
     * @param p2 argument typu Punkt2
     * @param p3 argument typu Punkt2
     */
    double getTriangleArea(Punkt2 p1, Punkt2 p2, Punkt2 p3);
    
  public:

    /** @brief Publiczna składowa określająca ilość zdefiniowanych obiektów klasy Polygon */
    static unsigned int number;
  
    /** @brief Konstruktor domyślny */
    Polygon();

    /** 
     * @brief Konstruktor główny
     * 
     * @param _vertices argument typu Punkt2* przekazujący tablicę wierzchołków wielokąta
     * @param _count argument typu unsigned int przekazujący ilość wierzchołków
     */
    Polygon(Punkt2* _vertices, unsigned int _count); 

    /** 
     * @brief Konstruktor kopiujący
     * 
     * @param _p argument typu Polygon przekazujący obiekt do skopiowania
     */
    Polygon(const Polygon & _p);

    /**
     * @brief Konstruktor przenoszący
     * 
     * @param _p argument typu Polygon przekazujący obiekt do przeniesienia
     */
    Polygon(Polygon&& _p);

    /** @brief Destruktor klasy Polygon */
    ~Polygon();

    /** @brief Getter zwracający tablicę wierzchołków */
    Punkt2* getVertices();

    /** @brief Getter zwracający tablicę wierzchołków */
    int getCount();

    /** 
     * @brief Metoda konstruująca tablicę wierzchołków.
     * 
     * @param _vertices argument typu Punkt* przekazujący tablicę wierzchołków wielokąta
     * @param _count argument typu unsigned int przekazujący ilość wierzchołków.
     */
    void setVertices(Punkt2* _vertices, int _count);
    
    /** 
     * @brief Metoda zmieniająca wspólrzędne i-tego wierzchołka.
     * 
     * @param i argument typu int przekazujący numer wierchołka do zmiany
     * @param x argument typu double przekazujący nową wartość do współrzędnej x
     * @param y argument typu double przekazujący nową wartość do współrzędnej y
     */
    void changeVertex(int i, double x, double y);
    
    /** 
     * @brief Metoda ustawiająca ilość wierzchołków.
     * 
     * @param n argument typu int przekazujący ilość wierchołków
    */
    void setCount(int n);
    
    /** @brief Metoda obliczająca obwód wielokąta */
    double getPerimeter();

    /** @brief Metoda obliczająca pole wielokąta wypukłego */
    double getConvexArea();

    /** @brief Metoda obliczająca pole dowolnego wielokąta */
    double getArea();

    /** @brief Nadpisanie operatora << */
    friend std::ostream& operator<<(std::ostream& os, const Polygon& _p);

    /** @brief Nadpisanie operatora = */
    Polygon& operator=(const Polygon& p);

    /** @brief Nadpisanie operatora [] */
    Punkt2& operator[](int i);
};
