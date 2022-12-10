<template>
  <div class="">
    <div class="sideMenu__list">
      <div class="sideMenu__list-item" @click="showDropdown = !showDropdown">Klasa</div>
      <div class="sideMenu__dropdown" v-if="showDropdown">
        <ul class="sideMenu__dropdown-item">
          <li v-for="(schoolClass, id) in classes" :key="id">
            {{ schoolClass.name }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "TeacherMenuList",
  data() {
    return {
      showDropdown: false,
      classes: [
        {
          name: '1a'
        },
        {
          name: '1b'
        },
        {
          name: '1c'
        }
      ]
    }
  }
};
</script>
<style lang="scss">
.sideMenu {
 
}
</style>