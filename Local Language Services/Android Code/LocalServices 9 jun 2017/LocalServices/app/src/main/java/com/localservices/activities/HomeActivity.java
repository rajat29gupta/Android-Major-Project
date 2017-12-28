package com.localservices.activities;

import android.app.Dialog;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.widget.TextView;
import android.widget.Toast;

import com.localservices.R;
import com.localservices.adapter.LocalServiceAdapter;
import com.localservices.models.LocalServicesModel;
import com.localservices.others.Utils.ToolbarOperation;
import com.localservices.others.Utils.UserPrefData;

import java.util.ArrayList;

public class HomeActivity extends AppCompatActivity {

    RecyclerView rvLocalServices;
    LocalServiceAdapter localServiceAdapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        init();
    }
    public void init()
    {
        new ToolbarOperation(HomeActivity.this).setupToolbar("Local Services",false);
        rvLocalServices= (RecyclerView) findViewById(R.id.rvLocalServices);
        rvLocalServices.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
        ArrayList<LocalServicesModel> arrayList=new ArrayList<>();

        LocalServicesModel localServicesModel=new LocalServicesModel();
        localServicesModel.setLsName("Retail Food");
        arrayList.add(localServicesModel);

        LocalServicesModel localServicesModel1=new LocalServicesModel();
        localServicesModel1.setLsName("Health Tips");
        arrayList.add(localServicesModel1);

        LocalServicesModel localServicesModel2=new LocalServicesModel();
        localServicesModel2.setLsName("News");
        arrayList.add(localServicesModel2);

        LocalServicesModel localServicesModel3=new LocalServicesModel();
        localServicesModel3.setLsName("Restaurants");
        arrayList.add(localServicesModel3);

        localServiceAdapter=new LocalServiceAdapter(HomeActivity.this,getApplicationContext(),arrayList);
        rvLocalServices.setAdapter(localServiceAdapter);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main,menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId()==R.id.mnuSelectLanguage)
        {
           getSelectLanguageDialog();
        }
        return super.onOptionsItemSelected(item);
    }

    public void getSelectLanguageDialog()
    {
        final Dialog dialog=new Dialog(HomeActivity.this);
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
                new UserPrefData(HomeActivity.this).setSelectedLanguage(language[0]);
                Toast.makeText(HomeActivity.this,"Selected language: "+ language[0], Toast.LENGTH_SHORT).show();
               // localServiceAdapter.notifyDataSetChanged();
                init();
                dialog.dismiss();
            }
        });
        txtHindi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                language[0] ="hindi";
                new UserPrefData(HomeActivity.this).setSelectedLanguage(language[0]);
                Toast.makeText(HomeActivity.this,"Selected language: "+ language[0], Toast.LENGTH_SHORT).show();
                //localServiceAdapter.notifyDataSetChanged();
                init();
                dialog.dismiss();
            }
        });
        txtSpanish.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                language[0] ="spanish";
                new UserPrefData(HomeActivity.this).setSelectedLanguage(language[0]);
                Toast.makeText(HomeActivity.this,"Selected language: "+ language[0], Toast.LENGTH_SHORT).show();
                //localServiceAdapter.notifyDataSetChanged();
                init();
                dialog.dismiss();
            }
        });
        dialog.show();
    }
}
