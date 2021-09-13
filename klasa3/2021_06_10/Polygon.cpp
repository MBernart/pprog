/** @file Polygon.cpp
 *
 * @brief Implementacja metod klasy Polygon
 *
 * @author Patryk Janiak 3D
 * @date 2021.03.18
 * @version 1.0
 */

#include "Polygon.h"
#include<iostream>
#include<math.h>

unsigned int Polygon::number{0};

Polygon::Polygon() 
{
  std::cout << "\033[0;32mPolygon\033[0m Konstruktor domyślny\n";
  count = 0;
  vertices = nullptr;
  Polygon::number++;
}

Polygon::Polygon(Punkt2* _vertices, unsigned int _count) 
{
  std::cout << "\033[0;32mPolygon\033[0m Konstruktor główny\n";
  count = _count;
  // Kopia płytka
  // vertices = _vertices;
  // Kopia głęboka
  vertices = new Punkt2[count];
  for (int i = 0; i < count; i++) {
    vertices[i] = _vertices[i];
  }
  Polygon::number++;
}

Polygon::Polygon(const Polygon & _p) 
{
  std::cout << "\033[0;32mPolygon\033[0m Konstruktor kopiujący\n";
  count = _p.count;
  // Kopia płytka
  // vertices = _p.vertices;
  // Kopia głęboka
  vertices = new Punkt2[count];
  for (int i = 0; i < count; i++) {
    vertices[i] = _p.vertices[i];
  }
  Polygon::number++;
}

Polygon::Polygon(Polygon&& _p)
{
  std::cout << "\033[0;32mPolygon\033[0m Konstruktor przenoszący\n";
  count = _p.count;
  vertices = _p.vertices;

  _p.count = 0;
  _p.vertices = nullptr;
}

Polygon::~Polygon()
{
  std::cout << "\033[0;31mPolygon\033[0m Destruktor\n";
  if (vertices)
    delete[] vertices;
}

Punkt2* Polygon::getVertices() 
{
  return vertices;
}

int Polygon::getCount() 
{
  return count;
}

void Polygon::setVertices (Punkt2 * _vertices, int _count) 
{
  count = _count;
  // Kopia głęboka
  vertices = new Punkt2[count];
  for (int i = 0; i < count; i++) {
    vertices[i] = _vertices[i];
  }
}

void Polygon::changeVertex(int i, double x, double y)
{
  vertices[i].setX(x);
  vertices[i].setY(y);
}

void Polygon::setCount(int n)
{
  delete[] vertices;
  count = n;
  vertices = new Punkt2[count];
}

double Polygon::getPerimeter() 
{
  double perimeter = vertices[0].getDistance(vertices[count - 1]);
  for (int i = 1; i < count; i++) {
    perimeter += vertices[i].getDistance(vertices[i-1]);
  }
  return perimeter;
}

double Polygon::getTriangleArea(Punkt2 p1, Punkt2 p2, Punkt2 p3)
{
  // Pole z wierzchołków trójkąta 
  return 0.5 * abs(((p2.getX() - p1.getX()) * (p3.getY() - p1.getY()) - (p2.getY() - p1.getY()) * (p3.getX() - p1.getX())));
}

double Polygon::getConvexArea()
{
  // Wielokąt musi być wypukły
  double area{0.0};
  for (int i = 2; i < count; i++) {
    area += getTriangleArea(vertices[0], vertices[i-1], vertices[i]);
  }
  return area;
}

double Polygon::getArea() 
{
  // Shoelace formula
  double positive = vertices[0].getY() * vertices[count - 1].getX();
  double negative = vertices[0].getX() * vertices[count - 1].getY();

  for (int i = 1; i < count; i++) {
    positive += vertices[i].getY() * vertices[i-1].getX();
    negative += vertices[i].getX() * vertices[i-1].getY();
  }

  return 0.5 * abs(positive - negative);
}

std::ostream& operator<<(std::ostream& os, const Polygon& _p)
{
  os << "[\n";
  for (int i = 0; i < _p.count; i++)
    os << "\t" << _p.vertices[i] << "\n";
  os << "]";
  return os;
}

Polygon& Polygon::operator=(const Polygon& p)
{
  if (&p != this)
  {
    delete[] vertices;
    count = p.count;
    vertices = new Punkt2[count];
    for (int i = 0; i < count; i++)
      vertices[i] = p.vertices[i];
  }

  return *this;
}

Punkt2& Polygon::operator[](int i)
{
  return vertices[i];
}
