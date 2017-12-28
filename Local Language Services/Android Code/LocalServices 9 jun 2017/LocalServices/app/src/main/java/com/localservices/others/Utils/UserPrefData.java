package com.localservices.others.Utils;

import android.content.Context;

/**
 * Created by wscube on 28/10/16.
 */

public class UserPrefData {


    Context act;
    GetSetSharedPrefs prefs;

    String selectedLanguage = "selectedLanguage";

    public UserPrefData(Context act) {
        this.act = act;
        prefs = new GetSetSharedPrefs(act, "UserDetail");
    }

    public void setSelectedLanguage(String s) {
        prefs.putData(selectedLanguage, s);
    }


    public String getSelectedLanguage() {
        String s = "";
        s = prefs.getData(selectedLanguage);
        if(s.equals(""))
            s="english";
        return s;
    }


}
