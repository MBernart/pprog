/**
 * @file Punkt2.cpp
 * @author Mateusz Bernart (mateuszbernart@gmail.com)
 * @brief implementacja klasy Punkt2
 * @version 0.1
 * @date 2021-04-25
 * 
 * @copyright Copyright (c) 2021
 * 
 */
#include "Punkt2.h"
#include <cmath>

using std::ostream;

Punkt2::Punkt2(double _x, double _y)
{
    x = _x;
    y = _y;
}

/// brak parametrów - domyślny
Punkt2::Punkt2()
{
    x = 0.0;
    y = 0.0;
}

/// konstruktor kopiujący - brak jawności
//(w ogólności)
Punkt2::Punkt2(const Punkt2 &p)
{
    x = p.x;
    y = p.y;
}

void Punkt2::setX(double _x)
{
    x = _x;
}

double Punkt2::getX() const
{
    return x;
}

void Punkt2::setY(double _y)
{
    y = _y;
}

double Punkt2::getY() const
{
    return y;
}

double Punkt2::getDistance(const Punkt2 &_p) const
{
    double dx = _p.getX() - x;
    double dy = _p.getY() - y;
    return sqrt(dx * dx + dy * dy);
}

double Punkt2::getLength() const
{
    return sqrt(x * x + y * y);
}

Punkt2 Punkt2::getOppositeVector() const
{
    return Punkt2(-this->getX(),
                  -this->getY());
}

// skalowanie wektora przez -1 i
// szukanie przeciwnego to operacje tożsame
// a = p1.getOppositeVector() <=> a = p1.getScaledVector(-1)

Punkt2 Punkt2::getScaledVector(double k) const
{
    return Punkt2(this->getX() * k,
                  this->getY() * k);
}

double Punkt2::getDotProduct(const Punkt2 &p) const
{
    return this->getX() * p.getX() + this->getY() * p.getY();
}

double Punkt2::maximumNorm() const
{
    return (this->getX() > this->getY()) ? this->getX() : this->getY();
}

Punkt2 Punkt2::addVectors(const Punkt2 &p) const
{
    return Punkt2(this->getX() + p.getX(), this->getY() + p.getY());
}

double Punkt2::getAngleBetween(const Punkt2 &p) const
{
    double angle = acos(getDotProduct(p) / (getLength() * p.getLength()));
    return ((angle > M_PI) ? (2 * M_PI) - angle : angle);
}

// Punkt2 A, B
// Punkt2 C = A + B
//Punkt2 Punkt2::operator+(const Punkt2 &p) const
//{
//    // rolę B pełni argument p!!!
//    // rolę A pełni this (ja sam)
////    return this->addVectors(p);
//    return Punkt2(x + p.x, y + p.y);
//}

Punkt2 Punkt2::operator*(const double k) const
{
    return Punkt2::getScaledVector(k);
}

std::ostream &operator<<(std::ostream &os, const Punkt2 &p)
{
    os << "[" << p.x << ";" << p.y << "]";
    return os;
}

double Punkt2::operator*(const Punkt2 &p) const
{
    return x * p.x + y * p.y;
}

Punkt2 operator+(const Punkt2 &p1, const Punkt2 &p2)
{
    return Punkt2(p1.x + p2.y, p1.x + p2.y);
}

Punkt2 &Punkt2::operator=(const Punkt2 &p)
{
    if (&p != this)
    {
        x = p.x;
        y = p.y;
    }
    else
        std::cout << "Jestem tym samym!!\n";

    return *this;
}