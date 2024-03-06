<?php

declare(strict_types=1);

function dd(): void
{
  array_map(static function ($x): void {
    ob_start();
    var_dump($x);
    $buffer = ob_get_clean();

    if (false === $buffer) {
      throw new RuntimeException('Failed to dump variable');
    }

    echo '<pre style="background-color:#222222; color:#dddd; line-height:1.2em; font-weight:normal; font:12px monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:100000">';
    echo htmlentities($buffer);
    echo '</pre>';
  }, func_get_args());
}

function ZodiacSign(DateTime $dateTime): string
{
  $monthDay = $dateTime->format('md');

  // SignsOfZodiac: to('md') => sign
  $signs = [
    '0120' => 'Steinbock',
    '0219' => 'Wassermann',
    '0320' => 'Fische',
    '0420' => 'Widder',
    '0520' => 'Stier',
    '0621' => 'Zwilling',
    '0722' => 'Krebs',
    '0823' => 'Löwe',
    '0923' => 'Jungfrau',
    '1023' => 'Waage',
    '1122' => 'Skorpion',
    '1221' => 'Schütze',
    '1231' => 'Steinbock'
  ];

  foreach ($signs as $toMonthDay => $sign) {
    if ($monthDay <= $toMonthDay) {
      return $sign;
    }
  }

  return '';
}
