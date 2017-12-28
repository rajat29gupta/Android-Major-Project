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
import com.localservices.adapter.NewsModelAdapter;
import com.localservices.models.NewsModel;
import com.localservices.others.Utils.CheckNetwork;
import com.localservices.others.Utils.MyDialog;
import com.localservices.others.Utils.ToolbarOperation;
import com.localservices.others.Utils.Urls;
import com.localservices.others.Utils.UserPrefData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class NewsActivity extends AppCompatActivity {

    RecyclerView rvNews;
    ArrayList<NewsModel> arrNewsModel=new ArrayList<>();
    NewsModelAdapter newsModelAdapter;
    MyDialog myDialog;
    String language;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_news);
        init();
        language=new UserPrefData(getApplicationContext()).getSelectedLanguage();
        if(CheckNetwork.isConnected(getApplicationContext()))
            fetchNews();
        else
            myDialog.getNoInternetDialog();
    }
    public void init()
    {
        myDialog=new MyDialog(NewsActivity.this);
        new ToolbarOperation(NewsActivity.this).setupToolbar("News",true);
        rvNews= (RecyclerView) findViewById(R.id.rvNews);
        rvNews.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
        newsModelAdapter=new NewsModelAdapter(getApplicationContext(),arrNewsModel);
        rvNews.setAdapter(newsModelAdapter);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId()==android.R.id.home)
            onBackPressed();
        return super.onOptionsItemSelected(item);
    }

    public void fetchNews()
    {
        final Dialog loadingDialog=myDialog.getProgressDialog();
        AndroidNetworking.initialize(getApplicationContext());
        AndroidNetworking.get(Urls.viewNews)
                .setPriority(Priority.HIGH)
                .addQueryParameter("language",language)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.d("News Response",response.toString());
                        loadingDialog.dismiss();
                        try {
                            if(response.getString("result").equals("1"))
                            {
                                JSONArray msgArray=response.getJSONArray("msg");
                                for(int i=0;i<msgArray.length();i++)
                                {
                                    JSONObject job=msgArray.getJSONObject(i);
                                    NewsModel newsModel=new NewsModel();
                                    newsModel.setId(job.getString("online_news_id"));
                                    newsModel.setNewsTitle(job.getString("online_news_title"));
                                    newsModel.setNewsDescription(job.getString("online_news_description"));
                                    newsModel.setNewsDate(job.getString("online_news_date"));
                                    newsModel.setNewsUrl(job.getString("online_news_image"));
                                    arrNewsModel.add(newsModel);
                                }
                                newsModelAdapter.notifyDataSetChanged();
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
