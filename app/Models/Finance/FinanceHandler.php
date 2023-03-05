<?php

namespace App\Models\Finance;

class FinanceHandler
{
    public static function categoryByCode(string $code): string
    {
        $cat = self::allCategories();
        return $cat[$code] ?? null;
    }

    public static function allCategories(): array
    {
        return array_merge(self::allEntryCategories(), self::allExpenseCategories());
    }

    public static function allEntryCategories(): array
    {
        return [
            'entry-poupanca' => 'Poupança',
            'entry-salario' => 'Salário',
            'entry-bonus' => 'Bônus',
            'entry-juros' => 'Juros',
            'entry-outros-entrada' => 'Outros Entrada',
            'entry-dividendos' => 'Dividendos',
            'entry-aluguel-itajuba' => 'Aluguel Itajubá',
        ];
    }

    public static function allExpenseCategories(): array
    {
        return [
            'expense-alimentacao' => 'Alimentação',
            'expense-farmacia-saude' => 'Farmácia / Saúde',
            'expense-aluguel' => 'Aluguel',
            'expense-transporte' => 'Transporte',
            'expense-games' => 'Games',
            'expense-numismatica' => 'Numismática',
            'expense-pessoal' => 'Pessoal',
            'expense-compras' => 'Compras',
            'expense-educacao' => 'Educação',
            'expense-contas-casa' => 'Contas Casa',
            'expense-balada-bar' => 'Balada / Bar',
            'expense-presentes' => 'Presentes',
            'expense-debito' => 'Débito',
            'expense-outros-saída' => 'Outros Saída',
        ];
    }

    public static function operationByCode(string $code): string
    {
        $ops = self::allOperations();
        return $ops[$code] ?? null;
    }

    public static function allOperations(): array
    {
        return [
            'entries' => 'entries',
            'expenses' => 'expenses',
        ];
    }
}
