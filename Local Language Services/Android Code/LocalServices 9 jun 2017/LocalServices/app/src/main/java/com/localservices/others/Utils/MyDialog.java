package com.localservices.others.Utils;

import android.app.Activity;
import android.app.Dialog;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.view.View;
import android.view.Window;
import android.widget.TextView;
import android.widget.Toast;

import com.localservices.R;


/**
 * Created by wscubetech on 16/10/15.
 */
public class MyDialog {

    Activity act;

    public MyDialog(Activity act) {
        this.act = act;
    }

    public Dialog getMyDialog(int layout) {
        Dialog d = new Dialog(act);
        d.getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        d.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        d.setContentView(layout);
        return d;
    }

   public Dialog getProgressDialog() {
        Dialog dialog = new Dialog(act);
        dialog.getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        dialog.setContentView(R.layout.dialog_loading);
        dialog.setCancelable(false);
       dialog.show();
        return dialog;

    }

    public Dialog getNoInternetDialog() {
        final Dialog dialog = new Dialog(act);
        dialog.getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        dialog.setContentView(R.layout.no_internet_dialog);
        dialog.setCancelable(true);
        TextView txtOk= (TextView) dialog.findViewById(R.id.txtOk);
        dialog.show();
        txtOk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                dialog.dismiss();
            }
        });
        return dialog;

    }

    public void getSelectLanguageDialog()
    {
        final Dialog dialog=new Dialog(act);
        dialog.getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        dialog.setContentView(R.layout.dialog_select_language);
        dialog.setCancelable(true);
        TextView txtEnglish= (TextView) dialog.findViewById(R.id.txtEnglish);
        TextView txtHindi= (TextView) dialog.findViewById(R.id.txtHindi);
        TextView txtSpanish= (TextView) dialog.findViewById(R.id.txtSpanish);
        final String[] language = {"english"};
        txtEnglish.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                language[0] ="english";
                new UserPrefData(act).setSelectedLanguage(language[0]);
                Toast.makeText(act,"Selected language: "+ language[0], Toast.LENGTH_SHORT).show();
                dialog.dismiss();
            }
        });
        txtHindi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                language[0] ="hindi";
                new UserPrefData(act).setSelectedLanguage(language[0]);
                Toast.makeText(act,"Selected language: "+ language[0], Toast.LENGTH_SHORT).show();
                dialog.dismiss();
            }
        });
        txtSpanish.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                language[0] ="spanish";
                new UserPrefData(act).setSelectedLanguage(language[0]);
                Toast.makeText(act,"Selected language: "+ language[0], Toast.LENGTH_SHORT).show();
                dialog.dismiss();
            }
        });
        dialog.show();


    }
/*
    public Dialog getFeedbackDialog()
    {
        final Dialog dialog=new Dialog(act);
        dialog.getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        dialog.setContentView(R.layout.dialog_feedback);
        return dialog;
    }*/



}
