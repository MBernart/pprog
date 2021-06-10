//deklaracja klasy MapPoint - plik MapPoint.h
#pragma once
#include "Punkt2.h"

struct RGBA
{
	unsigned char  r;
	unsigned char  g;
	unsigned char  b;
	unsigned char  a{ 255 };//ta sk³adowa zwykle nie jest u¿ywana, wiêc j¹ inicjalizujemy w klasie

	friend std::ostream& operator<<(std::ostream& os, const RGBA& obj);

};

class MapPoint : public Punkt2 // po dwukropku podajemy klasê, któr¹ dziedziczy klasa MapPoint
{
	int visRadius; // promieñ ko³a reprezentuj¹cego punkt na mapie (w pikselach)

	RGBA visColor; // kolor ko³a reprezentuj¹cego punkt na mapie

	//teraz klasa MapPoint posiada cztery sk³adowe materialne: x,y, visRadius, visColor

public:
	MapPoint();

	MapPoint(double x, double y, int radius, RGBA color);

	MapPoint(const MapPoint& mp);

	MapPoint(const MapPoint&& mp);

	~MapPoint();

	void setVisRadius(int r);
	void setVisColor(RGBA color);

	int getVisRadius() const;
	RGBA getVisColor() const;

	MapPoint& operator=(const MapPoint& mp);
	MapPoint& operator=(MapPoint&& mp);

};

std::ostream& operator<<(std::ostream& os, const RGBA& obj);
std::ostream& operator<<(std::ostream& os, const MapPoint& obj);