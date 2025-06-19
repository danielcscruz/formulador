export interface Stock {
  idRaw: number;
  lote: string;
  id: number;
  name: string;
  quantity: number;
  last_update: string;
}

export const stockItems: Stock[] = [
{
    idRaw: 1,
    lote: 'UR200',
    id: 1,
    name: 'Fornecedor 1',
    quantity: 5000,
    last_update: '18/06/2025'
},
{
    idRaw: 1,
    lote: 'XXX8426',
    id: 2,
    name: 'Fornecedor 2',
    quantity: 2300,
    last_update: '18/06/2025'
},
{
    idRaw: 4,
    lote: 'MP876546',
    id: 3,
    name: 'Fornecedor A',
    quantity: 15000,
    last_update: '18/06/2025'
},
{
    idRaw: 8,
    lote: 'K9837918309',
    id: 4,
    name: 'Fornecedor xx',
    quantity: 150000,
    last_update: '18/06/2025'
},
]