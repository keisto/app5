Vue.component('tabs', {
  template: `
    <div>
        <div class="section" style="padding-bottom: 0">
        <div class="container is-fluid tabs">
          <ul>
            <li v-for="tab in tabs" :class="{'is-active': tab.isActive}">
              <a :href="tab.href" @click="selectTab(tab)">
                  {{ tab.name }}
              </a>
            </li>
          </ul>
        </div>
        </div>

        <div>
            <slot></slot>
        </div>
    </div>
  `,

  data() {
    return { tabs: [] };
  },

  created() {
    this.tabs = this.$children;
  },

  computed: {
    href() {
      return "#" + this.name.toLowerCase().replace(/ /g, '-');
    }
  },

  methods: {
    selectTab(selectedTab) {
      this.tabs.forEach(tab => {
        tab.isActive = (tab.name == selectedTab.name);
      })
    }
  }

});

Vue.component('tab', {
  template: '<div v-show="isActive"><slot></slot></div>',

  props: {
    name: { required: true },
    href: { required: false },
    selected: { default: false }
  },

  data() {
    return {
      isActive: false
    };
  },

  mounted(){
    this.isActive = this.selected;
  }
});

Vue.component('columns', {
  template: `
        <div class="columns">
          <slot></slot>
        </div>
      `
});

Vue.component('column', {
  props: {
    title: { required: false }
  },

  template: `
      <div class="column">
          <div class="field">
            <label class="label is-small has-text-grey-light">{{ title }}</label>
            <div class="control">
              <slot></slot>
            </div>
          </div>
        </div>`
});



new Vue({
  el: '#app'
});
