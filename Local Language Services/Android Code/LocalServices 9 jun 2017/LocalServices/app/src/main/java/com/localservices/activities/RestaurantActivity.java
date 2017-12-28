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
import com.localservices.adapter.RestaurantAdapter;
import com.localservices.models.RestaurantModel;
import com.localservices.others.Utils.CheckNetwork;
import com.localservices.others.Utils.MyDialog;
import com.localservices.others.Utils.ToolbarOperation;
import com.localservices.others.Utils.Urls;
import com.localservices.others.Utils.UserPrefData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class RestaurantActivity extends AppCompatActivity {

    RecyclerView rvRestaurant;
    RestaurantAdapter restaurantAdapter;
    ArrayList<RestaurantModel> arrRestaurantModel=new ArrayList<>();
    MyDialog myDialog;
    String language;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_restaurrant);
        init();
        language=new UserPrefData(getApplicationContext()).getSelectedLanguage();
        if(CheckNetwork.isConnected(getApplicationContext()))
            fetchRestaurants();
        else
            myDialog.getNoInternetDialog();
    }
    public void init()
    {
        myDialog=new MyDialog(RestaurantActivity.this);
        new ToolbarOperation(RestaurantActivity.this).setupToolbar("Restaurants",true);
        rvRestaurant= (RecyclerView) findViewById(R.id.rvRestaurant);
        rvRestaurant.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
        restaurantAdapter=new RestaurantAdapter(getApplicationContext(),arrRestaurantModel);
        rvRestaurant.setAdapter(restaurantAdapter);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId()==android.R.id.home)
            onBackPressed();
        return super.onOptionsItemSelected(item);
    }

    public void fetchRestaurants()
    {
        final Dialog loadingDialog=myDialog.getProgressDialog();
        AndroidNetworking.initialize(getApplicationContext());
        AndroidNetworking.get(Urls.viewRestaurants)
                .setPriority(Priority.HIGH)
                .addQueryParameter("language",language)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.d("Restaurant Response",response.toString());
                        loadingDialog.dismiss();
                        try {
                            if(response.getString("result").equals("1"))
                            {
                                JSONArray msgArray=response.getJSONArray("msg");
                                for (int i=0;i<msgArray.length();i++)
                                {
                                    JSONObject job=msgArray.getJSONObject(i);
                                    RestaurantModel restaurantModel=new RestaurantModel();
                                    restaurantModel.setId(job.getString("restaurant_id"));
                                    restaurantModel.setRestaurantName(job.getString("restaurant_name"));
                                    restaurantModel.setRestaurantAddress(job.getString("restaurant_address"));
                                    restaurantModel.setRestaurantCat(job.getString("restaurant_category"));
                                    restaurantModel.setRestaurantImageUrl(job.getString("restaurant_image"));
                                    arrRestaurantModel.add(restaurantModel);
                                }
                                restaurantAdapter.notifyDataSetChanged();
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
