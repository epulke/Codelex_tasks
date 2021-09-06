<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public static function swap_points(Point $point1, Point $point2 ): void
    {
        $x1 = $point1->x;
        $y1 = $point1->y;
        $x2 = $point2->x;
        $y2 = $point2->y;
        $point1->x = $x2;
        $point1->y = $y2;
        $point2->x = $x1;
        $point2->y = $y1;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

Point::swap_points($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")" . PHP_EOL;
echo "(" . $p2->getX() . ", " . $p2->getY() . ")" . PHP_EOL;