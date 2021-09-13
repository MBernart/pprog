#include "MapPoint.h"

MapPoint::MapPoint(double x, double y, int radius, RGBA color) :
	Punkt2(x, y), visRadius{ radius }, visColor{ color }
{}

MapPoint::MapPoint() :
	MapPoint(0.0, 0.0, 0, { 0,0,0,255 })
{}

MapPoint::MapPoint(const MapPoint& mp) :
	Punkt2(mp), visRadius{ mp.getVisRadius() }, visColor{ mp.getVisColor() }
{}



// konstruktor przenosz¹cy klasy MapPoint - plik MapPoint.cpp
// u¿ywana jest tu funkcja std::move() w argumencie 
// konstruktora przenosz¹cego klasy bazowej 

MapPoint::MapPoint(const MapPoint&& mp) :
	Punkt2(std::move(mp)), visRadius{ mp.getVisRadius() }, visColor{ mp.getVisColor() }
{}



// kopiuj¹cy operator przypisania klasy MapPoint - plik MapPoint.cpp

MapPoint& MapPoint::operator=(const MapPoint& mp)
{
	if (this != &mp)
	{
		Punkt2::operator=(mp);
		visRadius = mp.getVisRadius();
		visColor = mp.getVisColor();
	}

	return *this;
}



// przenosz¹cy operator przypisania klasy MapPoint - plik MapPoint.cpp
// u¿ywana jest tu funkcja std::move() w argumencie 
// przenosz¹cego operatora przypisania klasy bazowej 

MapPoint& MapPoint::operator=(MapPoint&& mp)
{
	if (this != &mp)
	{
		Punkt2::operator=(std::move(mp));
		visRadius = mp.getVisRadius();
		visColor = mp.getVisColor();
	}

	return *this;
}



//destruktor

MapPoint::~MapPoint()
{}


//operator<<

std::ostream& operator<<(std::ostream& os, const MapPoint& obj)
{
	Punkt2 p = static_cast<Punkt2>(obj); //rzutowanie na klasê bazow¹

	os << p << " " << obj.getVisColor() << "width(" << obj.getVisRadius() << ")\n";

	return os;
}

void MapPoint::setVisRadius(int r)
{
	visRadius = r;
}
void MapPoint::setVisColor(RGBA color)
{
	visColor = color;
}

int MapPoint::getVisRadius() const
{
	return visRadius;
}
RGBA MapPoint::getVisColor() const
{
	return visColor;
}

std::ostream& operator<<(std::ostream& os, const RGBA& obj)
{
	os << "color(" << (int)obj.r << ", " << (int)obj.g << ", " << (int)obj.b << ", " << (int)obj.a << ") ";

	return os;
}