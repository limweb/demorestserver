const state = {
    title: 'Title',
    description: 'Description',
    questions:[  
      { "is":"shortanswer"        ,  "answer":"", "ques": {"qtitle": "1. Short Answer"        ,"choices": []                                                                                                 }, "active":              false, "toggle": false                               },
      { "is":"paragraph"          ,  "answer":"", "ques": {"qtitle": "2. Paragraph"           ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"paragraph"          },
      { "is":"multiplechoice"     ,  "answer":"", "ques": {"qtitle": "3. Multichoices"        ,"choices": [{"choice":"choice 1"}, {"choice":"choice 2"},  {"choice":"choice 3"}]                             }, "active":              false, "toggle": false, "oldis":"multiplechoice"     },
      { "is":"checkboxes"         ,  "answer":"", "ques": {"qtitle": "4. Checkboxes"          ,"choices": [{"choice":"choice 1"}, {"choice":"choice 2"},  {"choice":"choice 3"}]                             }, "active":              false, "toggle": false, "oldis":"checkboxes"         },
      { "is":"dropdowntype"       ,  "answer":"", "ques": {"qtitle": "5. Dropdown"            ,"choices": [{"choice":"choice 1"}, {"choice":"choice 2"},  {"choice":"choice 3"}]                             }, "active":              false, "toggle": false, "oldis":"dropdowntype"       },
      { "is":"fileupload"         ,  "answer":"", "ques": {"qtitle": "6  File Upload"         ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"fileupload"         },
      { "is":"linescale"          ,  "answer":4, "ques": {"qtitle": "7. Line Scale"          ,"choices": {"numstart":1,"numend":10,"starttxt":"Start","endtxt":"End"}                                       }, "active":              false, "toggle": false, "oldis":"linescale"          },
      { "is":"multipolechoicegrid",  "answer":["0,0", "1,1"], "ques": {"qtitle": "8. Multiple choice Grid","choices": {"rows":[{"label":"row 1"}, {"label":"row 2"}],"cols":[{"label":"column 1"}, {"label":"column 2"}]}}, "active":              false, "toggle": false, "oldis":"multipolechoicegrid"},
      { "is":"checkboxgrid"       ,  "answer":"", "ques": {"qtitle": "9. Multiple choice Grid","choices": {"rows":[{"label":"row 1"}, {"label":"row 2"}],"cols":[{"label":"column 1"}, {"label":"column 2"}]}}, "active":              false, "toggle": false, "oldis":"checkboxgrid"       },
      { "is":"datetype"           ,  "answer":"", "ques": {"qtitle": "10. Date"                ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"datetype"           },
      { "is":"timetype"           ,  "answer":"", "ques": {"qtitle": "11. Time"                ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"timetype"           },
      { "is":"monthtype"          ,  "answer":"", "ques": {"qtitle": "12. Month"               ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"monthtype"          },
      { "is":"yeartype"           ,  "answer":"", "ques": {"qtitle": "13. Year"                ,"choices": ""                                                                                                 }, "active":              true,  "toggle": false, "oldis":"yeartype"           } 
    ],
    view:false,
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