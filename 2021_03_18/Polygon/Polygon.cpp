#include <cmath>
#include "Polygon.h"

uint Polygon::number = 0;

/**
 * Konstruktor domyślny klasy Polygon
 */
Polygon::Polygon()
{
    std::cout << "Wywołanie konstruktora domyślnego\n";
    count = 0;
    vertices = nullptr;
    number++;
}

/**
 * Dwuargumentowy konstruktor klasy Polygon
 *
 * @param vertices[in] argument typu Punkt2*  przekazujący tablicę wierzchołków wielokąta
 * @param count[in] argument typu unsigned int przekazujący ilość wierzchołków.
 */
Polygon::Polygon(Punkt2 *vertices, unsigned int count)
{
    std::cout << "Wywołanie konstruktora dwuargumentowego\n";
    this->count = count;
    this->vertices = new Punkt2[count];
    for (int i = 0; i < count; i++)
        this->vertices[i] = vertices[i];
    number++;
}

/**
 * Konstruktor klasy - wierzchołkom przypisuje się wartości domyślne
 *
 * @param i ilość wierzchołków
 */
Polygon::Polygon(uint i)
{
    std::cout << "Wywołanie konstruktora jednoargumentowego\n";
    count = i;
    vertices = new Punkt2[count];
}


/**
 * Konstruktor kopiujący klasy Polygon
 *
 * @param pol[in] obiekt klasy Polygon
 */
Polygon::Polygon(const Polygon &pol)
{
    std::cout << "Wywołanie konstruktora kopiującego\n";
    count = pol.count;
    vertices = new Punkt2[pol.count];
    for (int i = 0; i < count; i++)
        vertices[i] = pol.vertices[i];
    number++;
}

/**
 * Destruktor klasy Polygon
 */
Polygon::~Polygon()
{
    std::cout << "Wywołanie destruktora\n";
    number--;

}

/**
 * Metoda zmieniająca wspólrzędne i-tego wierzchołka.
 *
 * @param i argument typu int  przekazujący numer wierchołka do zmiany
 * @param x argument typu  double przekazujący nową wartość do współrzędnej x.
 * @param y argument typu  double przekazujący nową wartość do współrzędnej y.
 *
 * @relatesalso Punkt2.setX(), Punkt2.setY()
 */
void Polygon::changeVertex(int i, double x, double y)
{
    vertices[i].setX(x);
    vertices[i].setY(y);
}

/**
 * Metoda konstruująca tablicę wierzchołków.
 *
 * @param _vertices argument typu Punkt2*  przekazujący tablicę wierzchołków wielokąta
 * @param _count argument typu unsigned int przekazujący ilość wierzchołków.
 *
 * @relatesalso changeVertex()
 * @relatesalso setCount()
 */
void Polygon::setVertices(Punkt2 *_vertices, int _count)
{
    delete vertices;
    setCount(_count);
    for (int i = 0; i < _count; ++i)
        changeVertex(i, _vertices[i].getX(), _vertices[i].getY());
    count = _count;
}

/**
* Metoda ustawiająca ilość wierzchołków.
*
* @param n n argument typu int przekazujący ilość wierchołków
*
* @relatesalso setVertices()
*/
void Polygon::setCount(int n)
{
    vertices = new Punkt2[n];
    count = n;
}

/**
 * Metoda obliczająca obwód wielokąta
 *
 * @return wartość typu doule reprezentująca obwód wielokąta
 */
double Polygon::getPerimeter() const
{
    auto perimeter{0.0};
    for (int i = 0; i < count - 1; i++)
        perimeter += vertices[i].getDistance(vertices[i + 1]);
    perimeter += vertices[0].getDistance(vertices[count - 1]);
    return perimeter;
}

/**
 * Metoda zwracająca wskaźnik do tablicy wierzchołków
 *
 * @return wartość typi Punkt2* reprezentująca współrzędne wierzchołków
 */
Punkt2 *Polygon::getVertices() const
{
    auto vertices_array = new Punkt2[count];
    for (int i = 0; i < count; i++)
        vertices_array[i] = vertices[i];
    return vertices_array;
}

/**
 * Metoda zwraca pole trójkąta
 *
 * @param p1 argument typu Punkt2 przekazujący wierzchołek trójkąta
 * @param p2 argument typu Punkt2 przekazujący wierzchołek trójkąta
 * @param p3 argument typu Punkt2 przekazujący wierzchołek trójkąta
 *
 * @return wartość typu double reprezentującą pole trójkąta
 */
double Polygon::getTriangleArea(const Punkt2 &p1, const Punkt2 &p2, const Punkt2 &p3)
{
    return 0.5 * std::abs(((p2.getX() - p1.getX()) * (p3.getY() - p1.getY()) -
                           (p2.getY() - p1.getY()) * (p3.getX() - p1.getX())));
}

/**
 * Metoda obliczająca pole wielokąta wypukłego
 *
 * @return wartość typu double reprezentująca pole wielokąta wypukłego
 */
double Polygon::getConvexArea() const
{
    double area{0.0};
    for (int i = 1; i < count - 1; i++)
        area += getTriangleArea(vertices[0],
                                vertices[i], vertices[i + 1]);
    return area;
}

/**
 * Funkcja zwraca pole wielokąta
 *
 * @return wartość typu double reprezentująca pole wielokąta
 */
double Polygon::getArea() const
{
    double leftSum = 0.0;
    double rightSum = 0.0;

    for (uint i = 0; i < count; ++i)
    {
        uint j = (i + 1) % count;
        leftSum += vertices[i].getX() * vertices[j].getY();
        rightSum += vertices[j].getX() * vertices[i].getY();
    }

    return 0.5 * std::abs(leftSum - rightSum);
}

/**
 * Funkcja wypisuje wielokąt wraz z obliczonymi wartościami
 */
void Polygon::print() const
{
    std::cout << "\nDany jest wielokąt o wierzchołkach: \n";
    for (int i = 0; i < count; i++)
        std::cout << vertices[i] << " ";
    std::cout << "\nObwód tegowielokąta wynosi: " << getPerimeter()
              << "\nPole convex tego wielokątu wynosi: " << getConvexArea() << '\n'
              << "Metodą Sholeace pole wynosi: " << getArea() << '\n';
}
