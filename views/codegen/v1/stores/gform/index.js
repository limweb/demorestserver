const state = {
    title: 'Title',
    description: 'Description',
    questions:[  
      {"is":"shortanswer"        , "vis":"v_shortanswer"        , "answer":"", "ques": {"qtitle": "Short Answer"        ,"choices": []                                                                                                 }, "active":              false, "toggle": false                               },
      {"is":"paragraph"          , "vis":"v_paragraph"          , "answer":"", "ques": {"qtitle": "Paragraph"           ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"paragraph"          },
      {"is":"multiplechoice"     , "vis":"v_multiplechoice"     , "answer":"", "ques": {"qtitle": "Multichoices"        ,"choices": [{"choice":"choice 1"}, {"choice":"choice 2"},  {"choice":"choice 3"}]                             }, "active":              false, "toggle": false, "oldis":"multiplechoice"     },
      {"is":"checkboxes"         , "vis":"v_checkboxes"         , "answer":"", "ques": {"qtitle": "Checkboxes"          ,"choices": [{"choice":"choice 1"}, {"choice":"choice 2"},  {"choice":"choice 3"}]                             }, "active":              false, "toggle": false, "oldis":"checkboxes"         },
      {"is":"dropdowntype"       , "vis":"v_dropdowntype"       , "answer":"", "ques": {"qtitle": "Dropdown"            ,"choices": [{"choice":"choice 1"}, {"choice":"choice 2"},  {"choice":"choice 3"}]                             }, "active":              false, "toggle": false, "oldis":"dropdowntype"       },
      {"is":"fileupload"         , "vis":"v_fileupload"         , "answer":"", "ques": {"qtitle": "File Upload"         ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"fileupload"         },
      {"is":"linescale"          , "vis":"v_linescale"          , "answer":"", "ques": {"qtitle": "Line Scale"          ,"choices": {"numstart":1,"numend":10,"starttxt":"Start","endtxt":"End"}                                       }, "active":              false, "toggle": false, "oldis":"linescale"          },
      {"is":"multipolechoicegrid", "vis":"v_multipolechoicegrid", "answer":"", "ques": {"qtitle": "Multiple choice Grid","choices": {"rows":[{"label":"row 1"}, {"label":"row 2"}],"cols":[{"label":"column 1"}, {"label":"column 2"}]}}, "active":              false, "toggle": false, "oldis":"multipolechoicegrid"},
      {"is":"checkboxgrid"       , "vis":"v_checkboxgrid"       , "answer":"", "ques": {"qtitle": "Multiple choice Grid","choices": {"rows":[{"label":"row 1"}, {"label":"row 2"}],"cols":[{"label":"column 1"}, {"label":"column 2"}]}}, "active":              false, "toggle": false, "oldis":"checkboxgrid"       },
      {"is":"datetype"           , "vis":"v_datetype"           , "answer":"", "ques": {"qtitle": "Date"                ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"datetype"           },
      {"is":"timetype"           , "vis":"v_timetype"           , "answer":"", "ques": {"qtitle": "Time"                ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"timetype"           },
      {"is":"monthtype"          , "vis":"v_monthtype"          , "answer":"", "ques": {"qtitle": "Month"               ,"choices": ""                                                                                                 }, "active":              false, "toggle": false, "oldis":"monthtype"          },
      {"is":"yeartype"           , "vis":"v_yeartype"           , "answer":"", "ques": {"qtitle": "Year"                ,"choices": ""                                                                                                 }, "active":              true,  "toggle": false, "oldis":"yeartype"           } 
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