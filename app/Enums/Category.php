<?php

namespace App\Enums;

enum Category: string
{
    case entry_poupanca = 'Poupança';
    case entry_salario = 'Salário';
    case entry_bonus = 'Bônus';
    case entry_juros = 'Juros';
    case entry_outros_entrada = 'Outros Entrada';
    case entry_dividendos = 'Dividendos';
    case entry_aluguel_itajuba = 'Aluguel Itajubá';
    case expense_alimentacao = 'Alimentação';
    case expense_farmacia_saude = 'Farmácia / Saúde';
    case expense_aluguel = 'Aluguel';
    case expense_transporte = 'Transporte';
    case expense_games = 'Games';
    case expense_numismatica = 'Numismática';
    case expense_pessoal = 'Pessoal';
    case expense_compras = 'Compras';
    case expense_educacao = 'Educação';
    case expense_contas_casa = 'Contas Casa';
    case expense_balada_bar = 'Balada / Bar';
    case expense_presentes = 'Presentes';
    case expense_debito = 'Débito';
    case expense_outros_saída = 'Outros Saída';

    public static function getValue(string $name): string
    {
        $name = str_replace('-', '_', $name);

        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }
        return 'none';
    }
}
