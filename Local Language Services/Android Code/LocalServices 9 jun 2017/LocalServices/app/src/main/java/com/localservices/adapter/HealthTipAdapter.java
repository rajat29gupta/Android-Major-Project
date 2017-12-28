package com.localservices.adapter;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.ActivityOptionsCompat;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.localservices.R;
import com.localservices.activities.HealthTipsDetailActivity;
import com.localservices.models.HealthTipModel;
import com.localservices.others.Utils.Urls;

import java.util.ArrayList;

/**
 * Created by wscube on 5/6/17.
 */

public class HealthTipAdapter extends RecyclerView.Adapter<HealthTipAdapter.ViewHolder>{
    Context context;
    ArrayList<HealthTipModel> arrHealthTipModel;
    Activity activity;
    public HealthTipAdapter(Activity activity,Context context,ArrayList<HealthTipModel> arrHealthTipModel)
    {
        this.activity=activity;
        this.context=context;
        this.arrHealthTipModel=arrHealthTipModel;
    }
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view=LayoutInflater.from(context).inflate(R.layout.row_health_tips,parent,false);
        ViewHolder viewHolder=new ViewHolder(view);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(final ViewHolder holder, int position) {

        final HealthTipModel healthTipModel=arrHealthTipModel.get(position);
        holder.txtHealthTipName.setText(healthTipModel.getHealthTipName());
        holder.txtHealthTipDescription.setText(healthTipModel.getHealthTipDescription());
        Glide.with(context).load(Urls.imageUrl+healthTipModel.getHealthTipImage())
                .thumbnail(0.2f).placeholder(R.drawable.health).into(holder.imgHealthTip);
        holder.cardHealth.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(context, HealthTipsDetailActivity.class);
                intent.putExtra("healthModel",healthTipModel);
                intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                ActivityOptionsCompat options = ActivityOptionsCompat.makeSceneTransitionAnimation(activity,holder.imgHealthTip,"imgDetail");
                ActivityCompat.startActivity(activity, intent,
                        options.toBundle());
            }
        });
    }

    @Override
    public int getItemCount() {
        return arrHealthTipModel.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        ImageView imgHealthTip;
        TextView txtHealthTipName,txtHealthTipDescription;
        CardView cardHealth;
        public ViewHolder(View itemView) {
            super(itemView);
            cardHealth= (CardView) itemView.findViewById(R.id.cardHealth);
            imgHealthTip= (ImageView) itemView.findViewById(R.id.imgHealthTips);
            txtHealthTipName= (TextView) itemView.findViewById(R.id.txtHealthTipName);
            txtHealthTipDescription= (TextView) itemView.findViewById(R.id.txtHealthTipDescription);
        }
    }
}
