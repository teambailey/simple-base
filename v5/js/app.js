var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
})

var testTemplate = {
  template: '<h3>This is a test</h3>'
}
var testTemplate2 = {
  template: '<h3>This is a test 2</h3>'
}
var testTemplate3 = {
  template: '<h3>This is a test 3</h3>'
}

var app2 = new Vue({
  el: '#app-2',
  data: {
    seen: true,
    message: 'You loaded this page on ' + new Date(),
    message2: 'Sup butthole',
    todos: [
      { text: 'Item 1' },
      { text: 'Item 2' },
      { text: 'Item 3' },
    ]
  },
  components: {
    'first-test': testTemplate
  },
  methods: {
    reverseMessage: function() {
      console.log("YUP");
    }
  }
})

Vue.component('alb-test', {
  props: ['yup'],
  template: '<li>{{ yup.text }}</li>'
})

var app3 = new Vue({
  el: '#app3',
  data: {
    things: [
      { text: 'Item 4' },
      { text: 'Item 5' },
      { text: 'Item 6' },
    ]
  }
})

var app4 = new Vue({
  el: '#app4',
  data: {
    message: 'Andrew'
  },
  computed: {
    reversedMessage: function() {
      return this.message.split('').reverse().join('');
    }
  }
})

var app5 = new Vue({
  el: '#app5',
  data: {
    message: 'Bailey'
  },
  methods: {
    reverseMessage: function() {
      return this.message.split('').reverse().join('');
    }
  }
})

var demo = new Vue({
  el: '#demo',
  data: {
    firstName: 'Foo',
    lastName: 'Bar'
  },
  computed: {
    fullName: function () {
      return this.firstName + ' ' + this.lastName
    }
  }
})

var app6 = new Vue({
  el: '#app6',
  data: {
    firstName: 'Zip',
    lastName: 'Bap'
  },
  computed: {
    fullName: {
      // getter
      get: function() {
        return this.firstName + ' ' + this.lastName
      },
      // setter
      set: function (newValue) {
        var names = newValue.split(' ')
        this.firstName = names[0]
        this.lastName = names[names.length - 1]
      }
    }
  }
})

var app7 = new Vue({
  el: "#app7",
  data: {
    ok: false,
    nope: false
  }
})

var expample1 = new Vue({
  el: '.example1',
  data: {
    parentMessage: 'Parent',
    items: [
      { message: 'Foo' },
      { message: 'Bar' }
    ],
    items2: [
      { message2: 'Fip' },
      { message2: 'Sip' }
    ]
  }
})

var repeatObject = new Vue({
  el: '#repeat-object',
  data: {
    whatever: {
      firstName: 'Andrew',
      lastName: 'Bailey',
      Age: 35
    }
  }
})

var tempName1 = '<li>{{ title }}<button v-on:click="$emit(\'remove\')">X</button></li>'

Vue.component('todo-item', {
  template: tempName1,
  props: ['title']
})

new Vue({
  el: '#todo-list-example',
  data: {
    newTodoText: '',
    todos: [
      'This is the first one',
      'And this is the second one'
    ]
  },
  methods: {
    addNewTodo: function() {
      this.todos.push(this.newTodoText)
      this.newTodoText = ''
    }
  }
})

var veb = new Vue({
  el: '#example3',
  data: {
    currentView: 'posts'
  },
  components: {
    home: testTemplate,
    posts: testTemplate2,
    archive: testTemplate3,
  }
})

Vue.component('async-example', function (resolve, reject) {
  setTimeout(function () {
    // Pass the component definition to the resolve callback
    resolve({
      template: '<div>I am async!</div>'
    })
  }, 1000)
})

var app8 = new Vue({
  el: '#app8'
})










