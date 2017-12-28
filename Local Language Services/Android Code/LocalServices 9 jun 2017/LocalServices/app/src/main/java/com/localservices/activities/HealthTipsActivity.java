package com.localservices.activities;

import android.app.Dialog;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.MenuItem;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;
import com.localservices.R;
import com.localservices.adapter.HealthTipAdapter;
import com.localservices.models.HealthTipModel;
import com.localservices.others.Utils.CheckNetwork;
import com.localservices.others.Utils.MyDialog;
import com.localservices.others.Utils.ToolbarOperation;
import com.localservices.others.Utils.Urls;
import com.localservices.others.Utils.UserPrefData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class HealthTipsActivity extends AppCompatActivity {

    RecyclerView rvHealthTip;
    ArrayList<HealthTipModel> arrHealthTipModel=new ArrayList<>();
    HealthTipAdapter healthTipAdapter;
    MyDialog myDialog;
    String language;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_health_tips);
        init();
        language=new UserPrefData(getApplicationContext()).getSelectedLanguage();
        myDialog=new MyDialog(HealthTipsActivity.this);
        if(CheckNetwork.isConnected(getApplicationContext()))
        {
            fetchHealthTips();
        }
        else {
            myDialog.getNoInternetDialog();
        }
    }
    public void init()
    {
        new ToolbarOperation(HealthTipsActivity.this).setupToolbar("Health Tips",true);
        rvHealthTip= (RecyclerView) findViewById(R.id.rvHealthTip);
        rvHealthTip.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
        healthTipAdapter=new HealthTipAdapter(HealthTipsActivity.this,getApplicationContext(),arrHealthTipModel);
        rvHealthTip.setAdapter(healthTipAdapter);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId()==android.R.id.home)
            onBackPressed();
        return super.onOptionsItemSelected(item);
    }
    public void fetchHealthTips()
    {
        final Dialog progressDialog=myDialog.getProgressDialog();
        AndroidNetworking.initialize(getApplicationContext());
        AndroidNetworking.get(Urls.viewHealthTips)
                .setPriority(Priority.HIGH)
                .addQueryParameter("language",language)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.d("Health Response",response.toString());
                        progressDialog.dismiss();
                        try {
                            if(response.getString("result").equals("1"))
                            {
                                JSONArray msgArray=response.getJSONArray("msg");
                                for (int i=0;i<msgArray.length();i++)
                                {
                                    JSONObject job=msgArray.getJSONObject(i);
                                    HealthTipModel healthTipModel=new HealthTipModel();
                                    healthTipModel.setId(job.getString("health_id"));
                                    healthTipModel.setHealthTipName(job.getString("health_title"));
                                    healthTipModel.setHealthTipDescription(job.getString("health_description"));
                                    healthTipModel.setHealthTipImage(job.getString("health_image"));
                                    arrHealthTipModel.add(healthTipModel);
                                }
                                healthTipAdapter.notifyDataSetChanged();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }

                    @Override
                    public void onError(ANError anError) {

                    }
                });
    }
}
