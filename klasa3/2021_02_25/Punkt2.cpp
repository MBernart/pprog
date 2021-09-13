/*! \file Punkt2.cpp
	*
	* \brief Zawiera definicję klasy Punkt2
	*
	* Plik zawiera implementację metod klasy Punkt2.
	*
	* \author Jan Nowak
	* \date 2000.0.01
	* \version 1.00.00
	*/

#include "Punkt2.h"
#include <math.h>

using std::ostream;

Punkt2::Punkt2(double _x, double _y)
{
	x = _x;
	y = _y;
}

// brak parametrów - domyślny
Punkt2::Punkt2()
{
	x = 0.0;
	y = 0.0;
}

// konstruktor kopiujący - brak jawności
// (w ogólności)
Punkt2::Punkt2(const Punkt2 &p)
{
	x = p.x;
	y = p.y;
}

void Punkt2::setX(double _x)
{
	x = _x;
}

double Punkt2::getX()
{
	return x;
}

void Punkt2::setY(double _y)
{
	y = _y;
}

double Punkt2::getY()
{
	return y;
}

double Punkt2::getDistance(Punkt2 _p)
{
	double dx = _p.getX() - x;
	double dy = _p.getY() - y;
	return sqrt(dx * dx + dy * dy);
}

double Punkt2::getLength()
{
	return sqrt(x * x + y * y);
}

Punkt2 Punkt2::getOppositeVector()
{
	return Punkt2(-this->getX(),
				  -this->getY());
}

// skalowanie wektora przez -1 i
// szukanie przeciwnego to operacje tożsame
// a = p1.getOppositeVector() <=> a = p1.getScaledVector(-1)

Punkt2 Punkt2::getScaledVector(double k)
{
	return Punkt2(this->getX() * k,
				  this->getY() * k);
}

double Punkt2::getDotProduct(Punkt2 p)
{
	return this->getX() * p.getX() + this->getY() * p.getY();
}

double Punkt2::maximumNorm()
{
	return (this->getX() > this->getY()) ? this->getX() : this->getY();
}

Punkt2 Punkt2::addVectors(Punkt2 p)
{
	return Punkt2(this->getX() + p.getX(), this->getY() + p.getY());
}

double Punkt2::angleBetween(Punkt2 p)
{
	return acos(this->getDotProduct(p) / (this->getLength() * p.getLength()));
}

Punkt2 Punkt2::operator+(const Punkt2 &p)
{
	return this->addVectors(p);
}

Punkt2 Punkt2::operator*(const double k)
{
	return Punkt2::getScaledVector(k);
}

std::ostream &operator<<(std::ostream &os, const Punkt2 &p)
{
	os << "[" << p.x << ";" << p.y << "]";
	return os;
}

void Punkt2::print()
{
	std::cout << "(" << x << ", " << y << ")\n";
}