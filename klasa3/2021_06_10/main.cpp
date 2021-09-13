/** @file main.cpp
 *
 * @brief Kod programu testującego klasę Polygon
 *
 * Plik zawiera funkcję main(),
 * w której wykonano kilka podstawowych testów
 * dotyczących klasy Polygon oraz Punkt2
 *
 * @author Patryk Janiak 3D
 * @date 2021.03.18
 * @version 1.0
 */

#include<iostream>
#define Polygon Polygon_windows
#undef Polygon
#include "Punkt2.h"
#include "Polygon.h"
#include "MapPoint.h"

Polygon f() 
{
  Punkt2* punkty = new Punkt2[3];
  punkty[0] = Punkt2(0.0, 0.0);
  punkty[1] = Punkt2(0.0, 0.0);
  punkty[2] = Punkt2(0.0, 0.0);

  Polygon wielokat = Polygon(punkty, 3);

  return wielokat;
}

int main()
{
  /*f();

  Polygon p{new Punkt2[4]{{0.0, 0.0}, {2.0, 0.0}, {2.0, 7.1}, {0.0, 2.0}}, 4};
  p.changeVertex(2, 2.0, 2.0);

  std::cout << "Wielokąt p = " << p << "\n";

  std::cout << "p[1] = " << p[1] << "\n";

  std::cout << "Obwód prostokąta 2x2: " << p.getPerimeter() << "\n";

  std::cout << "Pole używając getConvexArea(): " << p.getConvexArea() << "\n";
  std::cout << "Pole używając getArea(): " << p.getArea() << "\n";

  std::cout << "Liczba utworzonych instancji klasy Polygon: " << Polygon::number << "\n";

  Punkt2 p1(1.0, 3.0), p2(5.0, 1.0);
  Punkt2 p3 = p1 + p2;

  std::cout << "Punkt p3 = " << p3 << "\n";*/

  Punkt2* punkty = new Punkt2[3];
  punkty[0] = Punkt2(0.0, 0.0);
  punkty[1] = Punkt2(0.0, 0.0);
  punkty[2] = Punkt2(0.0, 0.0);

  Polygon wielokat = Polygon(punkty, 3);

  std::cout << wielokat << "\n";

  Polygon wielokat2 = f();

  Polygon wielokat3 = wielokat2;


  MapPoint mp1 = MapPoint(); //konstruktor domyślny

  std::cout << mp1;

  MapPoint mp2 = MapPoint(10.0, 20.0, 7, { 255,0,255,255 }); //zwykły konstruktor

  MapPoint mp3 = mp2; //konstruktor kopiujący

  mp2 = mp3; //kopiujący operator przypisania

  MapPoint mp4 = MapPoint(10.0, 20.0, 7, { 255,0,255,255 }); //konstruktor przenoszący

  mp3 = MapPoint(10.0, 20.0, 7, { 255,0,255,255 }); //przenoszący operator przypisania

  return 0;

  // Punkt2 p1 = Punkt2(5.0, 0.6);
  // p1.print();

  // p1.setX(10.0);
  // p1.print();

  // Punkt2 p2;
  // p2.print();

  // std::cout << "Odległość od p1 do p2: " << p1.getDistance(p2) << "\n";

  // p2.setX(3.7);
  // p2.setY(6.1);
  // p2.print();

  // Punkt2 p3 = p2;
  // p3.print();

  // Punkt2 p4 = p1.add(p2);
  // std::cout << "p4 = p1 + p2: ";
  // p4.print();

  // Punkt2 p5 = p4.subtract(p1);
  // std::cout << "p5 = p4 - p1: ";
  // p5.print();
}