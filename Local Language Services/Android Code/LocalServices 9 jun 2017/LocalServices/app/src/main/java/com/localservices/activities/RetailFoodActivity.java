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
import com.localservices.adapter.RetailFoodAdapter;
import com.localservices.models.RetailFoodModel;
import com.localservices.others.Utils.CheckNetwork;
import com.localservices.others.Utils.MyDialog;
import com.localservices.others.Utils.ToolbarOperation;
import com.localservices.others.Utils.Urls;
import com.localservices.others.Utils.UserPrefData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class RetailFoodActivity extends AppCompatActivity {

    RecyclerView rvRetailFood;
    RetailFoodAdapter retailFoodAdapter;
    ArrayList<RetailFoodModel> arrRetailFoodModel = new ArrayList<>();
    MyDialog myDialog;
    String language;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_retail_food);
        language=new UserPrefData(getApplicationContext()).getSelectedLanguage();
        init();
    }

    public void init() {
        new ToolbarOperation(RetailFoodActivity.this).setupToolbar("Retail Foods",true);
        rvRetailFood = (RecyclerView) findViewById(R.id.rvRetailFood);
        rvRetailFood.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
        retailFoodAdapter = new RetailFoodAdapter(getApplicationContext(), arrRetailFoodModel);
        rvRetailFood.setAdapter(retailFoodAdapter);
        myDialog=new MyDialog(RetailFoodActivity.this);
        if (CheckNetwork.isConnected(getApplicationContext()))
            fetchRetailFood();
        else {
            myDialog.getNoInternetDialog();
        }
    }

    public void fetchRetailFood() {
      final Dialog loadingDialog= myDialog.getProgressDialog();
        AndroidNetworking.initialize(getApplicationContext());
        AndroidNetworking.get(Urls.viewRetailFood)
                .setPriority(Priority.MEDIUM)
                .addQueryParameter("language",language)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.d("Retail Food Response",response.toString());
                        try {
                            if(response.getString("result").equals("1")) {
                                loadingDialog.dismiss();
                                JSONArray arrMsg = response.getJSONArray("msg");
                                for (int i = 0; i < arrMsg.length(); i++) {
                                    JSONObject job = arrMsg.getJSONObject(i);
                                    RetailFoodModel retailFoodModel = new RetailFoodModel();
                                    retailFoodModel.setId(job.getString("retail_food_id"));
                                    retailFoodModel.setRfName(job.getString("retail_food_name"));
                                    retailFoodModel.setRfPrice(job.getString("retail_food_price"));
                                    retailFoodModel.setRfImgUrl(job.getString("retail_food_image"));
                                    arrRetailFoodModel.add(retailFoodModel);
                                }
                                retailFoodAdapter.notifyDataSetChanged();
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


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId()==android.R.id.home)
            onBackPressed();
        return super.onOptionsItemSelected(item);
    }
}
