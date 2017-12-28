package com.localservices.activities;

import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.graphics.Palette;
import android.view.MenuItem;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.animation.GlideAnimation;
import com.bumptech.glide.request.target.SimpleTarget;
import com.localservices.R;
import com.localservices.models.HealthTipModel;
import com.localservices.others.Utils.ToolbarOperation;
import com.localservices.others.Utils.Urls;

public class HealthTipsDetailActivity extends AppCompatActivity {

    TextView txtDetail,txtTitle;
    ImageView imgHealthTips;
    CollapsingToolbarLayout collapsingToolbarLayout;
    HealthTipModel healthModel;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_health_tips_detail);
        healthModel= (HealthTipModel) getIntent().getSerializableExtra("healthModel");
        init();
    }

    public void init()
    {
        new ToolbarOperation(HealthTipsDetailActivity.this).setupToolbar("Health Tip",true);
        collapsingToolbarLayout= (CollapsingToolbarLayout) findViewById(R.id.collapsingToolbar);
        txtDetail= (TextView) findViewById(R.id.txtDetail);
        txtTitle= (TextView) findViewById(R.id.txtTitle);
        imgHealthTips= (ImageView) findViewById(R.id.imgHealthTips);

        collapsingToolbarLayout.setTitle("Health Tip");
        collapsingToolbarLayout.setCollapsedTitleTextAppearance(R.style.collapsedappbar);
        collapsingToolbarLayout.setExpandedTitleTextAppearance(R.style.expandedappbar);
        Glide.with(getApplicationContext()).load(Urls.imageUrl+healthModel.getHealthTipImage())
                .placeholder(R.drawable.health).thumbnail(0.2f).into(imgHealthTips);
        dynamicToolbarColor();
        txtDetail.setText(healthModel.getHealthTipDescription());
        txtTitle.setText(healthModel.getHealthTipName());
    }
    private void dynamicToolbarColor()
    {
  /*      final Bitmap[] bitmap = {null};
        new AsyncTask<Void, Void, Void>() {
            @Override
            protected Void doInBackground(Void... params) {
                Looper.prepare();
                try {
                    bitmap[0] = Glide.with(getApplicationContext()).load(Urls.imageUrl+healthModel.getHealthTipImage()).asBitmap().into(200,200).get();
                } catch (final ExecutionException e) {
                    Log.e("Error", e.getMessage());
                } catch (final InterruptedException e) {
                    Log.e("Error", e.getMessage());
                }
                return null;
            }
            @Override
            protected void onPostExecute(Void dummy) {
                if (null != bitmap[0]) {
                    // The full bitmap should be available here

                    //image.setImageBitmap(bitmap[0]);
                    Log.d("Succ", "Image loaded");

                };
            }
        }.execute();*/
        Glide
                .with(getApplicationContext())
                .load("https://www.google.es/images/srpr/logo11w.png")
                .asBitmap()
                .into(new SimpleTarget<Bitmap>(100,100) {
                    @Override
                    public void onResourceReady(Bitmap resource, GlideAnimation glideAnimation) {
                        //image.setImageBitmap(resource); // Possibly runOnUiThread()
                        Palette.from(resource).generate(new Palette.PaletteAsyncListener(){
                            @Override
                            public void onGenerated(Palette palette) {
                                collapsingToolbarLayout.setContentScrimColor(palette.getMutedColor(getResources().getColor(R.color.colorPrimary)));
                                collapsingToolbarLayout.setStatusBarScrimColor(palette.getMutedColor(getResources().getColor(R.color.colorPrimaryDark)));
                            }
                        });
                    }
                });
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId())
        {
            case android.R.id.home:
                onBackPressed();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }

      }
}
