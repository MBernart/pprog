/** @file Punkt2.cpp
 *
 * @brief Implementacja metod klasy Punkt2.
 *
 * @author Patryk Janiak 3D
 * @date 2021.03.18
 * @version 1.0
 */

#include "Punkt2.h"
#include<math.h>
#include<iostream>

Punkt2::Punkt2() 
{
  // std::cout << "\033[0;32mPunkt2\033[0m Konstruktor domyślny\n";
  x = 0.0;
  y = 0.0;
}

Punkt2::Punkt2(double _x, double _y) 
{
  // std::cout << "\033[0;32mPunkt2\033[0m Konstruktor główny\n";
  x = _x;
  y = _y;
}

Punkt2::Punkt2(const Punkt2 & _p) 
{
  // std::cout << "\033[0;32mPunkt2\033[0m Konstruktor kopiujący\n";
  x = _p.x;
  y = _p.y;
}

Punkt2::~Punkt2()
{
  // std::cout << "\033[0;31mPunkt2\033[0m Destruktor\n";
}

void Punkt2::print() const
{
  std::cout << "(" << x << ", " << y << ")\n";
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

double Punkt2::getDistance(Punkt2 _p) const 
{
  double dx = _p.getX() - x;
  double dy = _p.getY() - y;
  return sqrt(dx*dx + dy*dy);
}

// double Punkt2::getRadius()
// {
//   return sqrt(x*x + y*y);
// }

double Punkt2::getLength() const
{
  return sqrt(x*x + y*y);
}

Punkt2 Punkt2::add(Punkt2 _p) const 
{
  Punkt2 temp;
  temp.setX(x + _p.getX());
  temp.setY(y + _p.getY());
  return temp;
}

Punkt2 Punkt2::subtract(Punkt2 _p) const 
{
  Punkt2 temp;
  temp.setX(x - _p.getX());
  temp.setY(y - _p.getY());
  return temp;
}

Punkt2 Punkt2::multiply(double skalar) const 
{
  Punkt2 temp;
  temp.setX(skalar * x);
  temp.setY(skalar * y);
  return temp;
}

Punkt2 Punkt2::getInverse() const
{
  return multiply(-1);
}

bool Punkt2::isInverse(Punkt2 _p) const 
{
  return _p.getX() == -x && _p.getY() == -y;
}

double Punkt2::getProduct(Punkt2 _p) const 
{
  return x * _p.getX() + y * _p.getY();
}

double Punkt2::getAngleBetween(Punkt2 _p) const
{
  return cos(getProduct(_p) / (getLength() * _p.getLength()));
}

//Punkt2 Punkt2::operator+(const Punkt2 & _p) const 
//{
//  return Punkt2(x + _p.getX(), y + _p.getY());
//}

Punkt2 operator+(const Punkt2& p1, const Punkt2& p2)
{
  return Punkt2(p1.x + p2.x, p1.y + p2.y);
}

Punkt2 Punkt2::operator*(double skalar) const 
{
  return Punkt2(x * skalar, y * skalar);
}

double Punkt2::operator*(const Punkt2 & _p) const 
{
  return x * _p.getX() + y * _p.getY();
}

std::ostream& operator<<(std::ostream& os, const Punkt2& _p)
{
  os << "Punkt2(" << _p.x << ", " << _p.y << ")";
  return os;
}

Punkt2& Punkt2::operator=(const Punkt2& p)
{
  if (&p != this)
  {
    x = p.x;
    y = p.y;
  }

  return *this;
}
