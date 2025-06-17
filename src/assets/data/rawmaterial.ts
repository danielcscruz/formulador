// Tipagem dos nutrientes
export type Nutrient = 'N' | 'P2O5' | 'K2O' | 'Ca' | 'S' | 'Mg' | 'Zn' | 'B' | 'Mn' | 'Mo' | 'Fe';

// Interface de cada fertilizante
export interface Fertilizer {
  code: number;
  chemicalName: string;
  commercialName: string;
  guarantees: Partial<Record<Nutrient, number>>;

}

// Dicionário de fertilizantes
export const rawMaterial: Fertilizer[] = [
  {
    code: 1,
    chemicalName: 'CO(NH₂)₂',
    commercialName: 'Ureia',
    guarantees: { N: 45 }
  },
  {
    code: 2,
    chemicalName: 'NH₄NO₃',
    commercialName: 'Nitrato de amônio',
    guarantees: { N: 33 }
  },
  {
    code: 3,
    chemicalName: '(NH₄)₂SO₄',
    commercialName: 'Sulfato de amônio',
    guarantees: { N: 20, S: 24 }
  },
  {
    code: 4,
    chemicalName: 'NH₄H₂PO₄',
    commercialName: 'MAP',
    guarantees: { N: 11, P2O5: 52 }
  },
  {
    code: 5,
    chemicalName: '(NH₄)₂HPO₄',
    commercialName: 'DAP',
    guarantees: { N: 18, P2O5: 46 }
  },
  {
    code: 6,
    chemicalName: 'Ca(H2PO4)2 + CaSO4 2H2O',
    commercialName: 'SSP',
    guarantees: { P2O5: 18, Ca: 18, S: 11 }
  },
  {
    code: 7,
    chemicalName: 'Ca(H₂PO₄)₂',
    commercialName: 'TSP',
    guarantees: { P2O5: 41, Ca: 14 }
  },
  {
    code: 8,
    chemicalName: 'KCl',
    commercialName: 'MOP',
    guarantees: { K2O: 60 }
  },
  {
    code: 9,
    chemicalName: 'K₂SO₄',
    commercialName: 'SOP',
    guarantees: { K2O: 50, S: 17 }
  },
  {
    code: 10,
    chemicalName: 'KNO₃',
    commercialName: 'Nitrato de potássio',
    guarantees: { N: 13, K2O: 44 }
  },
  {
    code: 11,
    chemicalName: 'CaCO₃ + CaMg(CO₃)₂',
    commercialName: 'Calcário',
    guarantees: { Ca: 25, Mg: 12 }
  },
  {
    code: 12,
    chemicalName: 'CaSO₄·2H₂O',
    commercialName: 'Gesso agrícola',
    guarantees: { Ca: 16, S: 12 }
  },
  {
    code: 13,
    chemicalName: 'MgSO₄·7H₂O',
    commercialName: 'Kieserita',
    guarantees: { S: 13, Mg: 9 }
  },
  {
    code: 14,
    chemicalName: 'ZnSO₄·H₂O',
    commercialName: 'Fertilizante de zinco',
    guarantees: { Zn: 18 }
  },
  {
    code: 15,
    chemicalName: 'H₃BO₃',
    commercialName: 'Fertilizante de boro',
    guarantees: { B: 17 }
  },
  {
    code: 16,
    chemicalName: 'MnSO₄·H₂O',
    commercialName: 'Fertilizante de manganês',
    guarantees: { Mn: 28 }
  },
  {
    code: 17,
    chemicalName: 'Na₂MoO₄·2H₂O',
    commercialName: 'Fertilizante de molibdênio',
    guarantees: { Mo: 39 }
  },
  {
    code: 18,
    chemicalName: 'FeSO₄·7H₂O',
    commercialName: 'Fertilizante de ferro',
    guarantees: { Fe: 19 }
  },
];
