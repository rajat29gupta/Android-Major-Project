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
import com.localservices.models.RestaurantModel;
import com.localservices.others.Utils.Urls;

import java.util.ArrayList;

/**
 * Created by wscube on 5/6/17.
 */

public class RestaurantAdapter extends RecyclerView.Adapter<RestaurantAdapter.ViewHolder>{

    Context context;
    ArrayList<RestaurantModel> arrRestaurantModel=new ArrayList<>();
    public RestaurantAdapter(Context context,ArrayList<RestaurantModel> arrRestaurantModel)
    {
        this.context=context;
        this.arrRestaurantModel=arrRestaurantModel;
    }
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view=LayoutInflater.from(context).inflate(R.layout.row_restaurant,parent,false);
        ViewHolder viewHolder=new ViewHolder(view);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {

        RestaurantModel restaurantModel=arrRestaurantModel.get(position);
        holder.txtRestaurantName.setText(restaurantModel.getRestaurantName());

        holder.txtRestaurantAddress.setText(restaurantModel.getRestaurantAddress());

        String category=restaurantModel.getRestaurantCat();
        if(category.equals("1"))
        {
            holder.imgCat.setImageResource(R.drawable.veg);
            category="Vegetarian";
        }
        else if(category.equals("2"))
        {
            holder.imgCat.setImageResource(R.drawable.non_veg);
            category="Non Vegetarian";
        }
        else if (category.equals("0"))
        {
            holder.imgCat.setImageResource(R.drawable.hamburger);
            category="Vegetarian & Non Vegetarian";
        }
        holder.txtRestaurantCat.setText(category);
        Glide.with(context).load(Urls.imageUrl+restaurantModel.getRestaurantImageUrl()).thumbnail(0.2f)
                .placeholder(R.drawable.restaurant).into(holder.imgRestaurant);
    }

    @Override
    public int getItemCount() {
        return arrRestaurantModel.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        ImageView imgRestaurant;
        TextView txtRestaurantName,txtRestaurantAddress,txtRestaurantCat;
        ImageView imgCat;
        public ViewHolder(View itemView) {
            super(itemView);
            imgRestaurant= (ImageView) itemView.findViewById(R.id.imgRestaurant);
            txtRestaurantName= (TextView) itemView.findViewById(R.id.txtRestaurantName);
            txtRestaurantAddress= (TextView) itemView.findViewById(R.id.txtRestaurantAddress);
            txtRestaurantCat= (TextView) itemView.findViewById(R.id.txtRestaurantCat);
            imgCat= (ImageView) itemView.findViewById(R.id.imgCat);
        }
    }
}
