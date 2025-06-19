<template>
  <VerticalLayout>
    <b-row>
      <b-col xl="12">
        <UIComponentCard id="fixed_header wrapper" title="Matérias-Primas">
          <div class="button-list d-flex justify-content-end gap-2 mt-3 btn-group">
            <!-- Botões normais -->
            <template v-if="!isActionMode">
              <b-button variant="success" size="sm" :disabled="!authStore.isAuthenticated" @click="handleAdd">
                <i class="bx bx-plus"></i>
              </b-button>
              <b-button variant="secondary" size="sm" :disabled="!authStore.isAuthenticated" @click="toggleEditMode">
                <i class="bx bx-pencil"></i>
              </b-button>
              <b-button variant="danger" size="sm" :disabled="!authStore.isAuthenticated" @click="toggleDeleteMode">
                <i class="bx bx-trash"></i>
              </b-button>
            </template>
            
            <!-- Botões de ação (Salvar/Cancelar) -->
            <template v-else>
              <b-button variant="success" size="sm" @click="handleSave">
                <i class="bx bx-check"></i> Salvar
              </b-button>
              <b-button variant="outline-secondary" size="sm" @click="handleCancel">
                <i class="bx bx-x"></i> Cancelar
              </b-button>
            </template>
          </div>
          <GridJsTable id="table-fixed-header" :options="tableOptions" :key="tableKey" />
        </UIComponentCard>
      </b-col>
    </b-row>
  </VerticalLayout>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { html } from 'gridjs'
import VerticalLayout from "@/layouts/VerticalLayout.vue"
import UIComponentCard from "@/components/UIComponentCard.vue"
import GridJsTable from "@/components/GridJsTable.vue"
import { rawMaterial, type Nutrient } from "@/assets/data/rawmaterial"
import { stockItems, type Stock } from "@/assets/data/stock"
import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()

// Declarar tipos para o Window
declare global {
  interface Window {
    handleEdit: (id: number) => void
    handleDelete: (id: number) => void
  }
}

// Definir os nutrientes em ordem
const nutrients: Nutrient[] = ['N', 'P2O5', 'K2O', 'Ca', 'S', 'Mg', 'Zn', 'B', 'Mn', 'Mo', 'Fe']

// Estados do componente
// const tableData = ref([...rawMaterial])
const tableData = ref([...stockItems])
const originalData = ref([...rawMaterial]) // Backup dos dados originais
const originalStock = ref([...stockItems])
const editMode = ref(false)
const deleteMode = ref(false)
const tableKey = ref(0)

// Estado para controlar se está em modo de ação (editar/deletar)
const isActionMode = computed(() => editMode.value || deleteMode.value)

// Gerar próximo ID disponível
const getNextId = () => {
  const maxId = Math.max(...tableData.value.map(item => item.code), 0)
  return maxId + 1
}

// Função para adicionar novo item
const handleAdd = () => {
  const newItem = {
    idRaw: 0,
    lote: 'Lote',
    id: 0,
    name: 0,
    quantity: 0,
    last_update: 'DD/MM/YYYY'

  }
  
  // Adicionar no início da lista
  tableData.value.unshift(newItem)
  
  // Atualizar tabela
  updateTable()
}

// Função para alternar modo de edição
const toggleEditMode = () => {
  // Salvar backup dos dados antes de entrar no modo de edição
  originalData.value = JSON.parse(JSON.stringify(tableData.value))
  editMode.value = true
  deleteMode.value = false
  updateTable()
}

// Função para alternar modo de exclusão
const toggleDeleteMode = () => {
  // Salvar backup dos dados antes de entrar no modo de exclusão
  originalData.value = JSON.parse(JSON.stringify(tableData.value))
  deleteMode.value = true
  editMode.value = false
  updateTable()
}

// Função para salvar alterações
const handleSave = async () => {
  try {
    // Aqui será implementada a API para salvar
    await saveToAPI()
    
    // Atualizar backup com os dados atuais
    originalData.value = JSON.parse(JSON.stringify(tableData.value))
    
    // Sair do modo de ação
    exitActionMode()
  } catch (error) {
    console.error('Erro ao salvar:', error)
    // Aqui você pode adicionar notificação de erro
  }
}

// Função para cancelar alterações
const handleCancel = () => {
  // Restaurar dados originais
  tableData.value = JSON.parse(JSON.stringify(originalData.value))
  
  // Sair do modo de ação
  exitActionMode()
}

// Função para sair do modo de ação
const exitActionMode = () => {
  editMode.value = false
  deleteMode.value = false
  updateTable()
}

// Função da API (vazia por enquanto)
const saveToAPI = async () => {
  // Aqui será implementada a chamada para a API
  // Exemplo:
  // const response = await fetch('/api/raw-materials', {
  //   method: 'POST',
  //   headers: { 'Content-Type': 'application/json' },
  //   body: JSON.stringify(tableData.value)
  // })
  // if (!response.ok) throw new Error('Erro ao salvar')
  
  console.log('Dados a serem salvos:', tableData.value)
  
  // Simular delay da API
  return new Promise(resolve => setTimeout(resolve, 500))
}

// Função para editar item
const handleEdit = (id: number) => {
  const item = tableData.value.find(item => item.code === id)
  if (!item) return

  // Criar campos de entrada para edição
  const commercialName = prompt('Nome Comercial:', item.commercialName)
  const chemicalName = prompt('Fórmula Química:', item.chemicalName)
  
  if (commercialName !== null && chemicalName !== null ) {
    item.commercialName = commercialName
    item.chemicalName = chemicalName
    
    // Editar nutrientes
    nutrients.forEach(nutrient => {
      const currentValue = item.guarantees[nutrient] || 0
      const newValue = prompt(`${nutrient}:`, currentValue.toString())
      if (newValue !== null) {
        item.guarantees[nutrient] = parseFloat(newValue) || 0
      }
    })
    
    updateTable()
  }
}

// Função para excluir item
const handleDelete = (id: number) => {
  if (confirm('Tem certeza que deseja excluir este item?')) {
    const index = tableData.value.findIndex(item => item.code === id)
    if (index > -1) {
      tableData.value.splice(index, 1)
      updateTable()
    }
  }
}

// Função para atualizar a tabela
const updateTable = () => {
  tableKey.value++
}

// Gerar dados da tabela
const generateTableData = () => {
  return tableData.value.map(item => {
    const row = [
      item.code,
      item.commercialName,
      item.chemicalName,
      ...nutrients.map(n => item.guarantees[n] ?? '')
    ]
    return row
  })
}

// Gerar colunas da tabela
const generateColumns = () => {
  const idColumn = {
    name: 'ID',
    formatter: (cell: number) => {
      if (editMode.value) {
        return html(`
          <button class="btn btn-sm btn-outline-primary" onclick="window.handleEdit(${cell})">
            <i class="bx bx-edit"></i>
          </button>
        `)
      } else if (deleteMode.value) {
        return html(`
          <button class="btn btn-sm btn-outline-danger" onclick="window.handleDelete(${cell})">
            <i class="bx bx-trash"></i>
          </button>
        `)
      } else {
        return html(`<span class="fw-semibold small">${cell}</span>`)
      }
    }
  }

  const otherColumns = [
    {
      name: 'Nome comercial',
      formatter: (cell: string) => html(`<span class="fw-semibold">${cell}</span>`)
    },
    {
      name: 'Fórmula',
      formatter: (cell: string) => html(`<span class="small">${cell}</span>`)
    },
    ...nutrients.map(nutrient => ({
      name: nutrient,
      formatter: (cell: string | number) =>
        html(`<span class="text-center ${cell !== 0 && cell !== '' ? 'text-body' : 'text-muted'}">${cell}</span>`)
    }))
  ]

  return [idColumn, ...otherColumns]
}

// Opções da tabela (computed para reatividade)
const tableOptions = computed(() => ({
  columns: generateColumns(),
  data: generateTableData(),
  sort: true,
  search: {
  enabled: true,
  placeholder: 'Digite para buscar...'
  },
  language: {
    search: {
      placeholder: 'Buscar...'
    },
  noRecordsFound: 'Nenhum registro encontrado',
  error: 'Erro ao carregar dados'
  },
  pagination: false,
  fixedHeader: true,
  // height: '1000px',
}))

// Expor funções para o window (para uso nos botões HTML)
onMounted(() => {
  window.handleEdit = handleEdit
  window.handleDelete = handleDelete
})
</script>

<style scoped>
.wrapper {
  position: relative;
}

.btn-group {
  position: absolute;
  top: -2px;
  right: 24px;
}
</style>