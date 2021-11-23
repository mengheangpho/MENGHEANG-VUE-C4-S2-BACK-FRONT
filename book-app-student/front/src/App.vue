
<template>
  <section>
    <header>
      <h1>My books</h1>
    </header>
    <book-form @add-book='addNewBook'></book-form>
    <ul>
      <book-card 
      v-for="book of Books" 
      :key="book.id" 
      :book='book'
      @deleteBook='deleteBook(book.id)'
      ></book-card>
    </ul>
  </section>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      Api_Url:'http://127.0.0.1:8000/api/books/',
      Books:[]
    };
  },
  methods: {
    getBooks() {
      axios.get(this.Api_Url).then(res => {
        this.Books = res.data;
    })
    },
    addNewBook(title, description){
      let book = {
        'title': title,
        'description': description
      }
      axios.post(this.Api_Url,book).then(res =>{
        console.log(res.data.mss);
        this.getBooks();
      });
    },
    deleteBook(BookId){
      axios.delete(this.Api_Url+BookId).then(res=>{
        console.log(res.data.mss);
        this.getBooks();
      }).catch(error=>{
        console.log(error);
      });
    }

  },
  mounted() {
    this.getBooks();
  }
};
</script>

<style>
:root {
  --main-color: #3a2dfc;
}

* {
  box-sizing: border-box;
}

html {
  font-family: sans-serif;
}

body {
  margin: 0;
}

header {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  margin: 3rem auto;
  border-radius: 10px;
  padding: 1rem;
  background-color: var(--main-color);
  color: white;
  text-align: center;
  width: 90%;
  max-width: 40rem;
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

button {
  cursor: pointer;
  border: 1px solid var(--main-color);
  background-color: var(--main-color);
  color: white;
  padding: 0.5rem 1rem;
  box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.26);
}

button:hover,
button:active {
  box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.26);
}
</style>