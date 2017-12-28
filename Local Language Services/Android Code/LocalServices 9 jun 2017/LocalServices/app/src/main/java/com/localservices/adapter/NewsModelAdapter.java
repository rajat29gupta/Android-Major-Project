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
import com.localservices.models.NewsModel;
import com.localservices.others.Utils.Urls;

import java.util.ArrayList;

/**
 * Created by wscube on 5/6/17.
 */

public class NewsModelAdapter extends RecyclerView.Adapter<NewsModelAdapter.ViewHolder> {
    Context context;
    ArrayList<NewsModel> arrNewsModel;
    public NewsModelAdapter(Context context,ArrayList<NewsModel> arrNewsModel)
    {
        this.context=context;
        this.arrNewsModel=arrNewsModel;
    }
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view=LayoutInflater.from(context).inflate(R.layout.row_news,parent,false);
        ViewHolder viewHolder=new ViewHolder(view);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {

        NewsModel newsModel=arrNewsModel.get(position);
        holder.txtNewsTitle.setText(newsModel.getNewsTitle());
        holder.txtNewsDate.setText(newsModel.getNewsDate());
        holder.txtNewsDescription.setText(newsModel.getNewsDescription());
        Glide.with(context).load(Urls.imageUrl+newsModel.getNewsUrl())
                .thumbnail(0.2f).placeholder(R.drawable.news1).into(holder.imgNews);
    }

    @Override
    public int getItemCount() {
        return arrNewsModel.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        ImageView imgNews;
        TextView txtNewsTitle,txtNewsDescription,txtNewsDate;
        public ViewHolder(View itemView) {
            super(itemView);
            imgNews= (ImageView) itemView.findViewById(R.id.imgNews);
            txtNewsTitle= (TextView) itemView.findViewById(R.id.txtNewsTitle);
            txtNewsDescription= (TextView) itemView.findViewById(R.id.txtNewsDescription);
            txtNewsDate= (TextView) itemView.findViewById(R.id.txtNewsDate);
        }
    }
}
