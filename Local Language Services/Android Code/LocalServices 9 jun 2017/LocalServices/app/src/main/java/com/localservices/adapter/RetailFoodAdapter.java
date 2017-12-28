package com.localservices.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.localservices.R;
import com.localservices.models.RetailFoodModel;
import com.localservices.others.Utils.Urls;

import java.util.ArrayList;

/**
 * Created by wscube on 5/6/17.
 */

public class RetailFoodAdapter extends RecyclerView.Adapter<RetailFoodAdapter.ViewHolder>{
    Context context;
    ArrayList<RetailFoodModel> arrRetailFoodModel;
    public RetailFoodAdapter(Context context,ArrayList<RetailFoodModel> arrRetailFoodModel)
    {
        this.context=context;
        this.arrRetailFoodModel=arrRetailFoodModel;
    }
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view=LayoutInflater.from(context).inflate(R.layout.row_retaill_food,parent,false);
        ViewHolder viewHolder=new ViewHolder(view);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        RetailFoodModel retailFoodModel=arrRetailFoodModel.get(position);
        holder.txtRetailFoodName.setText(retailFoodModel.getRfName());
        holder.txtPrice.setText(context.getString(R.string.rs)+" "+retailFoodModel.getRfPrice());
        Glide.with(context).load(Urls.imageUrl+retailFoodModel.getRfImgUrl())
                .placeholder(R.drawable.retail_food).thumbnail(0.2f).into(holder.imgRetailFood);
    }

    @Override
    public int getItemCount() {
        return arrRetailFoodModel.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        ImageView imgRetailFood;
        TextView txtRetailFoodName,txtPrice;
        public ViewHolder(View itemView) {
            super(itemView);
            imgRetailFood= (ImageView) itemView.findViewById(R.id.imgRetailFood);
            txtRetailFoodName= (TextView) itemView.findViewById(R.id.txtRetailFoodName);
            txtPrice= (TextView) itemView.findViewById(R.id.txtPrice);
        }
    }
}
