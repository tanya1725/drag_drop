<template>
  <div>
    <div class="sidebar">
      <h3>Available Containers</h3>
      <div 
        v-for="container in availableContainers" 
        :key="container.id" 
        class="draggable-container" 
        draggable="true" 
        @dragstart="onDragStart($event, container, 'container')"
      >
        {{ container.name }}
      </div>

      <h3>Available Rows</h3>
      <div 
        v-for="row in availableRows" 
        :key="row.id" 
        class="draggable-row" 
        draggable="true" 
        @dragstart="onDragStart($event, row, 'row')"
      >
        {{ row.name }}
      </div>
    </div>

    <div 
      class="main-part" 
      @dragover.prevent 
      @drop="onDrop($event, 'main')"
    >
      <h3>Main Part</h3>
      <div 
        v-for="(container, index) in mainContainers" 
        :key="container.id" 
        class="container"
        @dragover.prevent 
        draggable="true"
        @drop="onDrop($event, 'container', index)"
        @dragstart="onDragStart($event, container, 'container', index)"
      >
        <h4>{{ container.name }}</h4>
        <div 
          v-for="(row, rowIndex) in container.rows" 
          :key="row.id" 
          class="row"
          @dragover.prevent
          draggable="true" 
          @dragstart="onDragStart($event, row, 'row', rowIndex)"
          @drop="onDrop($event, 'row', index, rowIndex)"
        >
          {{ row.name }}
        </div>
      </div>
    </div>

    <div class="json-output">
      <h3>JSON Representation</h3>
      <pre>{{ jsonOutput }}</pre>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      availableContainers: [
        { id: 0, name: 'Container ', class: 'container-class' },
        // Add more containers as needed
      ],
      availableRows: [
        { id: 0, name: 'Row ', class: 'row-class' },
        // Add more rows as needed
      ],
      mainContainers: [],
      draggedItem: null,
      draggedItemType: '',
      draggedContainerIndex: null,
      draggedRowIndex: null,
      nextContainerId: 1,
      nextRowId: 1,
      jsonOutput: ''
    };
  },
  methods: {
    onDragStart(event, item, type, index = null) {
      this.draggedItem = item;
      this.draggedItemType = type;

      if (type === 'container') {
        this.draggedContainerIndex = index;
      } else if (type === 'row') {
        this.draggedRowIndex = index;
      }

      event.dataTransfer.effectAllowed = "move";
      event.dataTransfer.setData("text/plain", JSON.stringify({ id: item.id, type, index }));
    },
    onDrop(event, dropTarget, containerIndex = null, rowIndex = null) {
      event.preventDefault();
      const { id, type } = JSON.parse(event.dataTransfer.getData("text/plain"));

      if (type === 'container' && dropTarget === 'main') {
        const container = this.availableContainers.find(c => c.id === id);
        if (container) {
          this.mainContainers.push({ ...container, id: this.nextContainerId++, rows: [] });
        }
      } else if (type === 'row' && dropTarget === 'container' ) {
        let row;

        // Check if the row is being moved from another container
        const sourceContainer = this.mainContainers.find(c => c.rows.some(r => r.id === id));
        console.log("row inside container");




    if (sourceContainer) {
      // Find the row within the source container
      row = sourceContainer.rows.find(r => r.id === id);
      console.log("gaya");
      if (row) {
        const rowIndexInSource = sourceContainer.rows.indexOf(row);
        if (rowIndexInSource !== -1) {
          // Remove the row from the source container
          sourceContainer.rows.splice(rowIndexInSource, 1);
          
        }
      }
    } else {
      // Row is from available rows
      row = this.availableRows.find(r => r.id === id);
      console.log("gaya");
    }

        // Add row to the target container
        if (row) {
          this.mainContainers[containerIndex].rows.push({ ...row, id: this.nextRowId++ });
          console.log("ohhhhoooooo");
        }
      } else if (type === 'row' && dropTarget === 'container' && containerIndex !== null && rowIndex !== null) {
        const container = this.mainContainers[containerIndex];


        
        if (container) {
          const movedRow = container.rows.splice(this.draggedRowIndex, 1)[0];
          container.rows.splice(rowIndex, 0, movedRow);
        }
      } else if (type === 'container' && dropTarget === 'container' && containerIndex !== null) {
        if (this.draggedContainerIndex !== null && this.draggedContainerIndex !== containerIndex) {
          const draggedContainer = this.mainContainers[this.draggedContainerIndex];
          const targetContainer = this.mainContainers[containerIndex];
          this.mainContainers.splice(this.draggedContainerIndex, 1, targetContainer);
          this.mainContainers.splice(containerIndex, 1, draggedContainer);
        }
      }

      this.updateJson();
      this.resetDragState();
    },
    updateJson() {
      this.jsonOutput = JSON.stringify(this.mainContainers, null, 2);
    },
    resetDragState() {
      this.draggedItem = null;
      this.draggedItemType = '';
      this.draggedContainerIndex = null;
      this.draggedRowIndex = null;
    }
  }
};
</script>

<style>
.sidebar, .main-part, .json-output {
  margin: 20px;
}
.draggable-container, .draggable-row, .container, .row {
  padding: 10px;
  border: 1px solid #ccc;
  margin-bottom: 10px;
  cursor: move;
  background-color: aquamarine;
}
.container {
  background-color: #f9f9f9;
}
</style>
