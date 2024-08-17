<template>
  <div>
    <DxDataGrid
      :data-source="students"
      key-expr="ID"
      :show-borders="true"
      @selection-changed="onSelectionChanged"
    >
      <DxFilterRow visible="true" />
      <DxColumn
        v-for="column in columns"
        :key="column"
        :data-field="column"
        :allow-sorting="true"
        :allow-selection="true"
        :header-filter="getHeaderFilter(column)"
      />
      <DxSearchPanel visible="true" />
    </DxDataGrid>

    <div v-if="selectedRows.length">
      <h3>Selected Students:</h3>
      <ul>
        <li v-for="student in selectedRows" :key="student.ID">
          {{ student.StudentName }} - {{ student.Class }} - {{ student.RollNo }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import { DxDataGrid, DxColumn, DxFilterRow, DxSearchPanel } from 'devextreme-vue/data-grid';

export default {
  components: {
    DxDataGrid,
    DxColumn,
    DxFilterRow,
    DxSearchPanel
  },
  setup() {
    let students = ref([]);
    const columns = ref(['StudentName', 'Class', 'RollNo', 'ClassTeacher', 'ArrivalTime', 'DepartureTime', 'AddmissionDate']);
    const startDate = ref('');
    const endDate = ref('');
    const selectedRows = ref([]);

    // Fetch data from the Laravel controller
    onMounted(async () => {
      try {
        const response = await axios.get('/getstudentlist'); // Adjust URL if needed
        console.log("Student Data",response.data);
        students.value = response.data;
      } catch (error) {
        console.error('Error fetching students data:', error);
      }
    });

    const filteredStudents = computed(() => {
      if (!startDate.value || !endDate.value) {
        return students.value;
      }

      const start = new Date(startDate.value);
      const end = new Date(endDate.value);

      return students.value.filter(student => {
        const studentDate = new Date(student.AddmissionDate.split('/').reverse().join('-'));
        return studentDate >= start && studentDate <= end;
      });
    });

    const onSelectionChanged = (e) => {
      selectedRows.value = e.selectedRowsData;
    };

    const getHeaderFilter = (column) => {
      if (column === 'AddmissionDate') {
        return {
          filterType: 'custom',
          filterOperations: [
            { text: 'Equal', value: 'equal' },
            { text: 'Not Equal', value: 'notEqual' },
            { text: 'Less Than', value: 'lessThan' },
            { text: 'Greater Than', value: 'greaterThan' },
            { text: 'Less Than or Equal To', value: 'lessThanOrEqual' },
            { text: 'Greater Than or Equal To', value: 'greaterThanOrEqual' }
          ],
          filterOperators: {
            equal: (value, filterValue) => value === filterValue,
            notEqual: (value, filterValue) => value !== filterValue,
            lessThan: (value, filterValue) => value < filterValue,
            greaterThan: (value, filterValue) => value > filterValue,
            lessThanOrEqual: (value, filterValue) => value <= filterValue,
            greaterThanOrEqual: (value, filterValue) => value >= filterValue
          }
        };
      }
      return {};
    };

    return {
      students,
      columns,
      startDate,
      endDate,
      filteredStudents,
      selectedRows,
      onSelectionChanged,
      getHeaderFilter
    };
  }
};
</script>

<style scoped>
.date-range {
  margin-bottom: 20px;
}
.date-range label {
  margin-right: 10px;
}
.date-range input {
  margin-right: 20px;
}
</style>
