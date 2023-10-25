$(document).ready(function() {
    const SURVEY_ID = $('#survey_id').val();
    const surveyJson = $('#survey_data').val();
    const surveySlug = $('#survey_slug').val();
    const survey = new Survey.Model(surveyJson);
    const storageItemKey = surveySlug;

    function saveSurveyData (survey) {
        const data = survey.data;
        data.pageNo = survey.currentPageNo;
        window.localStorage.setItem(storageItemKey, JSON.stringify(data));
    }

    // Save survey results to the local storage
    survey.onValueChanged.add(saveSurveyData);
    survey.onCurrentPageChanged.add(saveSurveyData);

    // Save uploaded file to the local or S3
    // survey.onUploadFiles.add((_, options) => {
    //     const formData = new FormData();
    //     options.files.forEach(file => {
    //         formData.append(file.lastModified, file);
    //     });
    //
    //     fetch("/api/survey/upload", {
    //         method: "POST",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         body: formData
    //     })
    //         .then(response => response.json())
    //         .then(data => {
    //             options.callback("success", options.files.map(file => {
    //                 return {
    //                     file: file,
    //                     content: data[file.lastModified]
    //                 };
    //             }));
    //         })
    //         .catch(error => {
    //             console.error("Error: ", error);
    //         });
    // });

    // Restore survey results
    const prevData = window.localStorage.getItem(storageItemKey) || null;
    if (prevData) {
        const data = JSON.parse(prevData);
        survey.data = data;
        if (data.pageNo) {
            survey.currentPageNo = data.pageNo;
        }
    }

    // Empty the local storage after the survey is completed
    survey.onComplete.add(() => {
        window.localStorage.setItem(storageItemKey, "");
    });

    //change language of survey here
    survey.locale = "vi";

    function alertResults (sender) {
        const results = JSON.stringify(sender.data);
        saveSurveyResults(
            "/api/survey/" + SURVEY_ID + "/result",
            sender.data
        )
    }

    survey.onComplete.add(alertResults);

    $(function() {
        $("#surveyContainer").Survey({ model: survey });
    });

    function saveSurveyResults(url, json) {
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=UTF-8'
            },
            body: JSON.stringify(json)
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                // Handle error
                console.log(error);
            });
    }
})


