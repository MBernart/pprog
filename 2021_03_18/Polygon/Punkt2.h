//
// Created by berni on 18/03/2021.
//

#ifndef PUNKT2_PUNKT2_H
#define PUNKT2_PUNKT2_H

#ifndef _PUNKT2_H
#define _PUNKT2_H


/*! \file Punkt2.h
	*
	* \brief Zawiera deklarację klasy Punkt2
	*
	* Plik zawiera deklarację klasy Punkt2.h.
	* Współrzędne punktu są podawane w układzie kartezjańskim.
	* Klasa zawiera kilka metod skladowych
	*
	* \author Jan Nowak
	* \date 2000.0.01
	* \version 1.00.00
	*/
#include <iostream>

class Punkt2
{
    // double x{0.0};
    // double y{0.0};
    double x;
    double y;

public:
    // konstruktor
    Punkt2(double, double);

    // konstruktor2
    Punkt2();

    // konstruktor kopiujący
    Punkt2(const Punkt2 &);

    // settery
    void setX(double);
    void setY(double);

    // gettery
    double getX() const;
    double getY() const;

    // współrzędne biegunowe
    double getRadius();
    double getAngle();

    // odległość punktu od punktu _p
    double getDistance(const Punkt2&) const;

    // zwraca odległość od początku
    // układu współrzędnych
    double getLength() const;

    // zwraca wektor przeciwny
    Punkt2 getOppositeVector() const;

    // zwraca wektor przeskalowany
    // o daną wartość
    Punkt2 getScaledVector(double) const;

    // zwraca iloczyn skalarny wektorów
    double getDotProduct(const Punkt2&) const;

    // norma maksimum
    double maximumNorm() const;

    // dodawanie wektorów p1 + p2
    Punkt2 addVectors(const Punkt2&) const;

    // kąt między wektorami
    double getAngleBetween(const Punkt2& p) const;

    // nadpisanie operatora +
    Punkt2 operator+(const Punkt2 &) const;

    // skalowanie przez operator *
    Punkt2 operator*(const double) const;

    // iloczyn skalarny przez operator *
    double operator*(const Punkt2 &);

    // nadpisanie operatora <<
    friend std::ostream &operator<<(std::ostream &os, const Punkt2 &);

    // drukarka
    void print() const;
};

#endif

#endif //PUNKT2_PUNKT2_H
