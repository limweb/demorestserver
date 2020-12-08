const state = {
    title: 'xx',
    description: 'uu',
    questions:[
        { is:'shortanswer' , answer:'', ques: { qtitle:'', choices: [] },  active: false, toggle: false},
        { is:'shortanswer' , answer:'', ques: { qtitle:'', choices: [] },  active: false, toggle: false},
    ]
 }

 const getters = {}
 const mutations = { }
 const actions = { }

 export default {
   namespaced: true,
   state,
   getters,
   mutations,
   actions
 }