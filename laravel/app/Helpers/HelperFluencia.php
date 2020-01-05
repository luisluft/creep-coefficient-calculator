<?php

namespace App\Helpers;

class HelperFluencia
{
    // Tests
    /*
     * Todas as variáveis serão inicializadas com o valor 777, caso o valor delas
     * aolongo do cálculo continue 777sigifica que elas possuem algum err pois     * não mudaram d valor inicial
     */
    
    public static function fluencia()
    {
        // Parâmetros que virão como input do ControllerFluenciaL
        $h      = 0.50;                        # espessura fictícia (m)
        $t      = 7;                           # idade total (dias)
        $T      = 30;                          # temperatura ambiente (ºC)
        $t0     = 4;                           # idade do carregamento inicial (dias)
        $CP     = 4;                           # tipo de cimento (I, II, III, IV)
        $fck    = 50;                          # resistência do concreto (MPa)
        $fct    = 20;                          # resistência do concreto na idade considerada entre 7 e 28 dias (MPa)
        $ab     = 5;                           # abatimento do concreto (cm)
        $U      = 70;                          # umidade do ambiente (%)
        $Ac     = 150;                         # área de seção transversal do concreto (cm²)
        $uar    = 50;                          # perímetro de concreto em contato com o ar (cm)
        $ag     = 'diabasio';                  # agregado utilizado na mistura
        $sigmaC = 30;                          # tensão devido ao carregamento (MPa)
        
        // Coeficiente da velocidade de endurecimento do concreto
        $alfa = self::velocidadeEndurecimentoConcreto($CP);
        
        // Idade fictícia do concreto no instante considerado (dias)
        $tfic = max(
            ($alfa * (($T + 10) / 30) * $t),
            3
        );
        
        // Idade fictícia do carregamento (dias)
        $t0fic = $alfa * (($T + 10) / 30) * $t0;
        
        // Polinômio da norma
        $A = 42 * $h ** 3 - 350 * $h ** 2 + 588 * $h + 113;
        $B = 768 * $h ** 3 - 3060 * $h ** 2 + 3234 * $h - 23;
        $C = -200 * $h ** 3 + 13 * $h ** 2 + 1090 * $h + 183;
        $D = 7579 * $h ** 3 - 31916 * $h ** 2 + 35343 * $h + 1931;
        
        // Coeficiente de deformação lenta irreversível no instante t
        $betaft = ($tfic ** 2 + $A * $tfic + $B) / ($tfic ** 2 + $C * $tfic + $D);
        
        // Coeficiente de deformação lenta irreversível no instante t0
        $betaft0 = ($t0fic ** 2 + $A * $t0fic + $B) / ($t0fic ** 2 + $C * $t0fic + $D);
        
        // Coeficiente de deformação lenta irreversível no instante t0
        $betad = ($tfic - $t0fic + 20) / ($tfic - $t0fic + 70);
        
        // Coeficiente 's'
        $s = self::coeficienteS($CP);
        
        // Função do crescimento de resistência do concreto com a idade
        $beta1 = exp($s * (1 - (28 / $tfic) ** 0.5));
        
        // Coeficiente de fluência rápida
        if ($fck >= 20 && $fck <= 45) {
            $phiA = 0.8 * (1 - $beta1);
        } elseif ($fck >= 50 && $fck <= 90) {
            $phiA = 1.4 * (1 - $beta1);
        }
        
        // Espessura fictícia
        $gamma = 1 + exp(-7.8 + 0.1 * $U);
        $hfic  = $gamma * 2 * $Ac / $uar;
        
        // Coeficiente de fluência lenta irreversível
        $phiFinf = self::coeficienteFluenciaLentaIrreversivel(
            $ab,
            $U,
            $fck,
            $hfic
        );
        
        // Coeficiente de fluência
        $phiDinf = 0.4;
        $phi     = $phiA + $phiFinf * ($betaft - $betaft0) + $phiDinf + $betad;
        
        // Coeficiente de agregados
        $sigmaE = self::coeficienteAgregado($ag);
        
        // Módulo de elasticidade inicial (MPa)
        $eci = self::moduloElasticidadeInicial(
            $fck,
            $t,
            $sigmaE,
            $fct
        );
        
        // Deformação por fluência
        return $sigmaC * $phi / $eci;
    }
    
    /**
     * @param int $CP
     *
     * @return int
     */
    protected static function velocidadeEndurecimentoConcreto(int $CP): int
    {
        $alfa = 777;
        switch ($CP) {
            case 1:
            case 2:
                $alfa = 2;
                break;
            case 3:
            case 4:
                $alfa = 1;
                break;
            case 5:
                $alfa = 3;
                break;
        }
        return $alfa;
    }
    
    /**
     * @param $CP
     *
     * @return float|int
     */
    protected static function coeficienteS($CP)
    {
        $s = 777;
        switch ($CP) {
            case 1:
            case 2:
                $s = 0.25;
                break;
            case 3:
            case 4:
                $s = 0.38;
                break;
            case 5:
                $s = 0.20;
                break;
        }
        return $s;
    }
    
    /**
     * @param int $ab
     * @param int $U
     * @param int $fck
     *
     * @param     $hfic
     *
     * @return float|int
     */
    protected static function coeficienteFluenciaLentaIrreversivel(int $ab, int $U, int $fck, $hfic)
    {
        if ($ab >= 0 && $ab <= 4) {
            $phi1c = (4.45 - 0.035 * $U) * 0.75;
        } elseif ($ab >= 5 && $ab <= 9) {
            $phi1c = 4.45 - 0.035 * $U;
        } elseif ($ab >= 10 && $ab <= 15) {
            $phi1c = (4.45 - 0.035 * $U) * 1.25;
        }
        
        $phi2c = (42 + $hfic) / (20 + $hfic);
        
        if ($fck >= 20 && $fck <= 45) {
            $phiFinf = $phi1c * $phi2c;
        } elseif ($fck >= 50 && $fck <= 90) {
            $phiFinf = $phi1c * $phi2c * 0.45;
        }
        
        return $phiFinf;
    }
    
    /**
     * @param string $ag
     *
     * @return float|int
     */
    protected static function coeficienteAgregado(string $ag)
    {
        $sigmaE = 777;
        
        switch ($ag) {
            case 'basalto':
            case 'diabasio':
                $sigmaE = 1.2;
                break;
            case 'granito':
            case 'gnaisse':
                $sigmaE = 1;
                break;
            case 'calcario':
                $sigmaE = 0.9;
                break;
            case 'arenito':
                $sigmaE = 0.7;
                break;
        }
        
        return $sigmaE;
    }
    
    /**
     * @param int $fck
     * @param int $t
     * @param     $sigmaE
     * @param int $fct
     *
     * @return float|int
     */
    protected static function moduloElasticidadeInicial(int $fck, int $t, $sigmaE, int $fct)
    {
        if ($fck >= 20 && ($fck <= 50 && $t >= 28)) {
            $eci = $sigmaE * 5600 * sqrt($fck);
        } elseif ($fck >= 55 && $fck <= 90 && $t >= 28) {
            $eci = 21.5 * 10 ** 3 * $sigmaE * (($fck / 10) + 1.25) ** (1 / 3);
        } elseif ($fck >= 20 && $fck <= 50 && $t <= 28 && $t >= 7) {
            $eci = $sigmaE * 5600 * sqrt($fck) * ($fct / $fck) ** 0.5;
        } elseif ($fck >= 55 && $fck <= 90 && $t <= 28 && $t >= 7) {
            $eci = 21.5 * 10 ** 3 * $sigmaE * ($fck / 10 + 1.25) ** (1 / 3) * ($fct / $fck) ** 0.5;
        }
        return $eci;
    }
}