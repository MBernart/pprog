#include <iostream>
#include <fstream>

using namespace std;

struct Book
{
    string title;
    string autor;
    uint rok_wydania;
    float id;
};

void saveBook(Book book, string path)
{
    ofstream file;
    file.open(path, ios::out | ios::binary);
    file.write((char *)&(book.id), sizeof(book.id));
    file.write((char *)&(book.rok_wydania), sizeof(book.rok_wydania));

    int size = book.title.size();
    file.write((char *)&size, sizeof(size));
    file.write((char *)book.title.data(), size);
    size = book.autor.size();
    file.write((char *)&size, sizeof(size));
    file.write((char *)book.autor.data(), size);
    file.close();
}

Book readBook(string path)
{
    ifstream file;
    Book book;
    int size;
    file.open(path, ios::in | ios::binary);
    file.read((char *)&book.id, sizeof(book.id));
    file.read((char *)&book.rok_wydania, sizeof(book.rok_wydania));
    file.read((char *)&size, sizeof(size));
    book.title.resize(size);
    file.read((char *)&book.title[0], size);
    file.read((char *)&size, sizeof(size));
    book.autor.resize(size);
    file.read((char *)&book.autor[0], size);
    file.close();
    return book;
}

int main(void)
{
    auto book = Book{"title1", "Jozef Kochanowski", 1610, 0.5};
    saveBook(book, "pliczek.bin");
    cout << book.title << '\n';
    auto b1 = readBook("pliczek.bin");
    cout << b1.title;
    return 0;
}