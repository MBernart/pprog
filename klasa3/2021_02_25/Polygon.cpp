#include "Polygon.h"

// Polygon::Polygon()
// {
//     count = 0;
//     vertices = nullptr;
// }

Polygon::Polygon(Punkt2 *vertices, unsigned int count)
{
    this->count = count;
    this->vertices = new Punkt2[count];
    for (int i = 0; i < count; i++)
        this->vertices[i] = vertices[i];
}

Polygon::Polygon(const Polygon &pol)
{
    this->count = pol.count;
    this->vertices = new Punkt2[pol.count];
    for (int i = 0; i < count; i++)
        this->vertices[i] = vertices[i];
}