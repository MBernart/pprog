#ifndef PUNKT2_PUNKT2_H
#define PUNKT2_PUNKT2_H

#ifndef _PUNKT2_H
#define _PUNKT2_H

#include <iostream>

class Punkt2
{
    double x;
    double y;

public:
    /// konstruktor dwuargumentowy
    Punkt2(double, double);

    /// konstruktor domyślny
    Punkt2();

    /// konstruktor kopiujący
    Punkt2(const Punkt2 &);

    /// setter X
    void setX(double);

    /// setter Y
    void setY(double);

    /// getter X
    double getX() const;

    /// getter Y
    double getY() const;

    /// funkcja wyznaczająca odległość punktu od punktu _p
    double getDistance(const Punkt2 &) const;

    /// zwraca odległość od początku układu współrzędnych
    double getLength() const;

    /// zwraca wektor przeciwny
    Punkt2 getOppositeVector() const;

    /// zwraca wektor przeskalowany o daną wartość
    Punkt2 getScaledVector(double) const;

    /// zwraca iloczyn skalarny wektorów
    double getDotProduct(const Punkt2 &) const;

    /// norma maksimum
    double maximumNorm() const;

    /// dodawanie wektorów p1 + p2
    Punkt2 addVectors(const Punkt2 &) const;

    /// kąt między wektorami
    double getAngleBetween(const Punkt2 &) const;

    void f(Punkt2);

    /// nadpisanie operatora +
    //    Punkt2 operator+(const Punkt2 &) const;

    /// skalowanie przez operator *
    Punkt2 operator*(double) const;

    /// iloczyn skalarny przez operator *
    double operator*(const Punkt2 &) const;

    /// nadpisanie operatora =
    Punkt2 &operator=(const Punkt2 &p);

    /// nadpisanie operatora <<
    friend std::ostream &operator<<(std::ostream &os, const Punkt2 &);

    /// zewnętrzny operator +
    friend Punkt2 operator+(const Punkt2 &, const Punkt2 &);

}; // Punkt2 koniec

#endif

#endif //PUNKT2_PUNKT2_H
