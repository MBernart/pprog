cmake_minimum_required(VERSION 3.0.0)
project(Polygon VERSION 0.1.0)

include(CTest)
enable_testing()

add_executable(Polygon main.cpp Punkt2.h Punkt2.cpp Polygon.h Polygon.cpp)

set(CPACK_PROJECT_NAME ${PROJECT_NAME})
set(CPACK_PROJECT_VERSION ${PROJECT_VERSION})
include(CPack)
