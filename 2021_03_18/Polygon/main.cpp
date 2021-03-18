/*! \file main.cpp
	*
	* \brief Kod programu testującego klasę Punkt2
	*
	* Plik zawiera funkcję main(),
	* w której wykonano kilka podstawowych testów
	* dotyczących klasy Punkt2
	*
	* \author Jan Nowak
	* \date 2000.0.01
	* \version 1.00.00
	*/

#include "Punkt2.h"
#include "Polygon.h"
#include <iostream>

using std::cout;

int main()
{
    // tworzenie reprezentanta klasy Polygon
    auto p = new Polygon(new Punkt2[4]{Punkt2(0, 1), Punkt2(0, 0), Punkt2(1, 0), Punkt2(1, 1)}, 4);
    // tworzenie kopii obiektu p
    auto c = p;
    uint n{2};
    // zmiana współrzędnych wierzchołka n
    c->changeVertex(n, 5, 5);
    // wypisanie wartości obwodu wielokąta c
    cout << "Obwód kwadrata 1 na 1 wynosi: " << c->getPerimeter();
    return 0;
}