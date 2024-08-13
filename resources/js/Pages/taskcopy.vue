<template>
  <div>
    <h1>To Do List</h1>
    <draggable 
      :list="toDoList" 
      :options="dragOptions"
      @end="onEnd"
    >
      <div v-for="item in toDoList" :key="item.id" class="item">
        {{ item.name }}
      </div>
    </draggable>

    <h1>Main Part</h1>
    <draggable 
      :list="mainPart" 
      :options="dragOptions"
    >
      <div v-for="item in mainPart" :key="item.id" class="item" draggable>
        {{ item.name }}
      </div>
    </draggable>
  </div>
</template>

<script>
import draggable from 'vuedraggable';

export default {
  components: {
    draggable
  },
  data() {
    return {
      toDoList: [{ id: 1, name: 'Container 1' }],
      mainPart: [],
      dragOptions: {
        group: {
          name: 'shared',
          pull: true,  // Allow dragging items out of this list
          put: true    // Allow dropping items into this list
        },
        sort: false
      }
    };
  },
  methods: {
    onEnd(event) {
      // Check if the item was moved to the mainPart
      if (event.from === this.$refs.toDoList) {
        // Create a new copy of the item
        const item = { ...event.item };
        item.id = Date.now();  // Generate a new unique ID
        this.mainPart.push(item);  // Add the new item to the mainPart
      }
    }
  }
};
</script>

<style>
.item {
  padding: 10px;
  border: 1px solid #ccc;
  margin: 5px;
  background-color: #f9f9f9;
}
</style>
